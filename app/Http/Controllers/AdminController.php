<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dependent;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Models\Payment;
use App\Notifications\SystemNotification;



class AdminController extends Controller

{

    /*

    |--------------------------------------------------------------------------

    | ADMIN DASHBOARD

    |--------------------------------------------------------------------------

    */



    public function dashboard()
    {
        // Total active members
        $totalMembers = Member::where('membership_status', 'Active')->count();

        // Registrations not yet checked by admin
        $pendingRegistrations = Member::whereNull('registration_checked_at')->count();

        // Claims waiting for approval
        $pendingClaims = \App\Models\Claim::where('status', 'Pending')->count();

        // Total successful/approved payments
        $totalCollection = \App\Models\Payment::whereIn(
            'payment_status',
            ['Successful', 'Approved']
        )->sum('amount');

        $pendingRenewals = Payment::where('payment_type', 'Renewal')
            ->where('payment_status', 'Successful')
            ->whereNull('renewal_checked_at')
            ->count();

        return view('admin.dashboard', compact(
            'totalMembers',
            'pendingRegistrations',
            'pendingRenewals',
            'pendingClaims',
            'totalCollection'
        ));
    }





    /*

    |--------------------------------------------------------------------------

    | MEMBER MANAGEMENT

    |--------------------------------------------------------------------------

    */



    // Display members with search and status filters

    public function members(Request $request)

    {

        $query = Member::with('user');



        // Filter Active / Inactive

        if ($request->filled('status')) {

            $query->where(

                'membership_status',

                $request->status

            );

        }



        // Search by IC number or name

        if ($request->filled('search')) {

            $search = $request->search;



            $query->where(function ($q) use ($search) {



                $q->where(

                    'ic_number',

                    'like',

                    '%' . $search . '%'

                )



                ->orWhereHas('user', function ($userQuery) use ($search) {



                    $userQuery->where(

                        'name',

                        'like',

                        '%' . $search . '%'

                    );



                });



            });

        }



        $members = $query

            ->orderBy('created_at', 'desc')

            ->get();



        return view(

            'admin.members',

            compact('members')

        );

    }





    // Display ADD MEMBER form

    public function createMember()

    {

        return view('admin.members_create');

    }





    // Save new member directly as Active

    public function storeMember(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => ['required', 'string', 'max:15', Rule::unique('members', 'ic_number')],
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|before_or_equal:today',
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'heir_name' => 'required|string|max:255',
            'heir_phone' => 'required|string|max:20',
            'dependents' => 'sometimes|array',
            'dependents.*.full_name' => 'required|string|max:255',
            'dependents.*.ic_number' => 'required|string|max:15',
            'dependents.*.birth_date' => 'required|date|before_or_equal:today',
            'dependents.*.relationship' => 'required|in:Anak,Isteri,Suami',
            'dependents.*.student_status' => 'nullable|in:Studying,Not Studying',
            'dependents.*.student_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        foreach ($validated['dependents'] ?? [] as $index => $data) {
            if ($data['relationship'] !== 'Anak') {
                continue;
            }
            $age = Carbon::parse($data['birth_date'])->age;
            if ($age >= 26) {
                throw ValidationException::withMessages([
                    "dependents.$index.birth_date" => 'Children aged 26 and above are not eligible.',
                ]);
            }
            if ($age >= 21) {
                if (($data['student_status'] ?? null) !== 'Studying') {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_status" => 'Children aged 21 to 25 must be studying.',
                    ]);
                }
                if (!$request->hasFile("dependents.$index.student_document")) {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_document" => 'Please upload a student verification document.',
                    ]);
                }
            }
        }

        $uploadedFiles = [];
        try {
            DB::transaction(function () use ($request, $validated, &$uploadedFiles) {
                $user = User::create([
                    'name' => $validated['full_name'],
                    'email' => $validated['email'],
                    'password' => $validated['password'],
                    'role' => 'member',
                ]);

                $member = Member::create([
                    'user_id' => $user->id,
                    'full_name' => $validated['full_name'],
                    'ic_number' => $validated['ic_number'],
                    'phone' => $validated['phone'],
                    'birth_date' => $validated['birth_date'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'heir_name' => $validated['heir_name'],
                    'heir_phone' => $validated['heir_phone'],
                    'registration_date' => now()->toDateString(),
                    'membership_expiry_date' => now()->addYear()->toDateString(),
                    'membership_status' => 'Active',
                    'membership_fee' => 60.00,
                    'admin_verified_by' => (string) auth()->id(),
                    'registration_checked_at' => now(),
                ]);

                $originalDependents = [];
                foreach ($validated['dependents'] ?? [] as $index => $data) {
                    $age = Carbon::parse($data['birth_date'])->age;
                    $requiresVerification = $data['relationship'] === 'Anak'
                        && $age >= 21 && $age < 26;
                    $documentPath = null;

                    if ($requiresVerification) {
                        $documentPath = $request
                            ->file("dependents.$index.student_document")
                            ->store('student-documents', 'public');
                        $uploadedFiles[] = $documentPath;
                    }

                    $dependent = $member->dependents()->create([
                        'full_name' => $data['full_name'],
                        'ic_number' => $data['ic_number'],
                        'date_of_birth' => $data['birth_date'],
                        'age' => $age,
                        'relationship' => $data['relationship'],
                        'status' => 'Active',
                        'is_student' => $requiresVerification,
                        'student_proof_path' => $documentPath,
                    ]);

                    $originalDependents[] = [
                        'dependent_id' => $dependent->dependent_id,
                        'full_name' => $data['full_name'],
                        'ic_number' => $data['ic_number'],
                        'birth_date' => $data['birth_date'],
                        'relationship' => $data['relationship'],
                        'student_status' => $requiresVerification ? 'Studying' : null,
                        'student_document_path' => $documentPath,
                    ];
                }

                $member->update([
                    'registration_snapshot' => [
                        'applicant' => [
                            'full_name' => $validated['full_name'],
                            'ic_number' => $validated['ic_number'],
                            'phone' => $validated['phone'],
                            'birth_date' => $validated['birth_date'],
                            'email' => $validated['email'],
                            'address' => $validated['address'],
                            'heir_name' => $validated['heir_name'],
                            'heir_phone' => $validated['heir_phone'],
                        ],

                        'dependents' => $originalDependents,

                        'payment' => [
                            'membership_fee' => 60.00,
                            'payment_method' => null,
                            'bank_name' => null,
                            'receipt_number' => null,
                        ],

                        'registration_date' => now()->toDateString(),
                    ],
                ]);
            });
            
        } catch (\Throwable $exception) {
            foreach ($uploadedFiles as $path) {
                Storage::disk('local')->delete($path);
            }
            throw $exception;
        }

        return redirect()->route('admin.members')
            ->with('success', 'New member registered successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT MEMBER
    |--------------------------------------------------------------------------
    */
    public function editMember($id)
    {
        $member = Member::with([
            'user',
            'dependents' => function ($query) {
                $query->where('status', '!=', 'Inactive');
            },
        ])->findOrFail($id);

        return view('admin.members_edit', compact('member'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE MEMBER
    |--------------------------------------------------------------------------
    */
    public function updateMember(Request $request, $id)
    {
        $member = Member::with(['user', 'dependents'])->findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => [
                'required', 'string', 'max:15',
                Rule::unique('members', 'ic_number')->ignore($member->member_id, 'member_id'),
            ],
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|before_or_equal:today',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($member->user_id, 'id'),
            ],
            'address' => 'required|string',
            'heir_name' => 'required|string|max:255',
            'heir_phone' => 'required|string|max:20',
            'dependents' => 'sometimes|array',
            'dependents.*.id' => 'nullable|integer|distinct',
            'dependents.*.full_name' => 'required|string|max:255',
            'dependents.*.ic_number' => 'required|string|max:15',
            'dependents.*.birth_date' => 'required|date|before_or_equal:today',
            'dependents.*.relationship' => 'required|in:Anak,Isteri,Suami',
            'dependents.*.student_status' => 'nullable|in:Studying,Not Studying',
            'dependents.*.student_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Only permit edits to dependents that belong to this member.
        // Do not trust client-submitted document flags or document paths.
        $activeDependents = $member->dependents
            ->filter(fn ($dependent) => $dependent->status !== 'Inactive')
            ->keyBy('dependent_id');
        $submittedIds = [];

        foreach ($validated['dependents'] ?? [] as $index => $data) {
            $existing = null;
            if (!empty($data['id'])) {
                $existing = $activeDependents->get((int) $data['id']);
                if (!$existing) {
                    throw ValidationException::withMessages([
                        "dependents.$index.id" => 'This dependent does not belong to the selected member.',
                    ]);
                }
                $submittedIds[] = (int) $data['id'];
            }

            if ($data['relationship'] !== 'Anak') {
                continue;
            }

            $age = Carbon::parse($data['birth_date'])->age;
            if ($age >= 26) {
                throw ValidationException::withMessages([
                    "dependents.$index.birth_date" => 'Children aged 26 and above are not eligible.',
                ]);
            }
            if ($age >= 21) {
                if (($data['student_status'] ?? null) !== 'Studying') {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_status" => 'Children aged 21 to 25 must still be studying.',
                    ]);
                }

                // An old document is reusable only if the student and
                // identifying details are unchanged and it exists on disk.
                $unchangedStudent = $existing
                    && $existing->relationship === 'Anak'
                    && (bool) $existing->is_student
                    && $existing->full_name === $data['full_name']
                    && $existing->ic_number === $data['ic_number']
                    && Carbon::parse($existing->date_of_birth)->isSameDay(Carbon::parse($data['birth_date']))
                    && $existing->student_proof_path
                    && Storage::disk('public')->exists($existing->student_proof_path);

                if (!$request->hasFile("dependents.$index.student_document") && !$unchangedStudent) {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_document" => 'Upload a student document for this dependent.',
                    ]);
                }
            }
        }

        $uploadedFiles = [];
        try {
            DB::transaction(function () use ($request, $validated, $member, $activeDependents, $submittedIds, &$uploadedFiles) {
                // Keep login name/email in sync, but never change password or role.
                if ($member->user) {
                    $member->user->update([
                        'name' => $validated['full_name'],
                        'email' => $validated['email'],
                    ]);
                }

                $member->update([
                    'full_name' => $validated['full_name'],
                    'ic_number' => $validated['ic_number'],
                    'phone' => $validated['phone'],
                    'birth_date' => $validated['birth_date'],
                    'email' => $validated['email'],
                    'address' => $validated['address'],
                    'heir_name' => $validated['heir_name'],
                    'heir_phone' => $validated['heir_phone'],
                ]);

                foreach ($validated['dependents'] ?? [] as $index => $data) {
                    $existing = !empty($data['id'])
                        ? $activeDependents->get((int) $data['id'])
                        : null;
                    $age = Carbon::parse($data['birth_date'])->age;
                    $requiresVerification = $data['relationship'] === 'Anak' && $age >= 21 && $age <= 25;
                    $newDocument = $request->file("dependents.$index.student_document");
                    $unchangedStudent = $existing
                        && $existing->relationship === 'Anak'
                        && (bool) $existing->is_student
                        && $existing->full_name === $data['full_name']
                        && $existing->ic_number === $data['ic_number']
                        && Carbon::parse($existing->date_of_birth)->isSameDay(Carbon::parse($data['birth_date']))
                        && $existing->student_proof_path
                        && Storage::disk('local')->exists($existing->student_proof_path);

                    $documentPath = $requiresVerification && $unchangedStudent
                        ? $existing->student_proof_path
                        : null;
                    if ($requiresVerification && $newDocument) {
                        $documentPath = $newDocument->store('student-documents', 'public');
                        $uploadedFiles[] = $documentPath;
                    }

                    $studentFields = [
                        'is_student' => $requiresVerification,
                    ];
                    $fields = array_merge([
                        'full_name' => $data['full_name'],
                        'ic_number' => $data['ic_number'],
                        'date_of_birth' => $data['birth_date'],
                        'age' => $age,
                        'relationship' => $data['relationship'],
                        'status' => 'Active',
                    ], $studentFields);

                    if ($existing) {
                        $existing->update($fields);
                    } else {
                        $member->dependents()->create($fields);
                    }
                }

                // Keep historical records; omitted dependents become inactive.
                // Do not modify registration_snapshot, payments, or claims.
                foreach ($activeDependents as $dependent) {
                    if (!in_array((int) $dependent->dependent_id, $submittedIds, true)) {
                        $dependent->update(['status' => 'Inactive']);
                    }
                }
            });
        } catch (\Throwable $exception) {
            foreach ($uploadedFiles as $path) {
                Storage::disk('public')->delete($path);
            }
            throw $exception;
        }

        return redirect()->route('admin.members')
            ->with('success', 'Member information updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE MEMBER (SOFT DELETE)
    |--------------------------------------------------------------------------
    */
    public function destroyMember($id)
    {
        $member = Member::findOrFail($id);
        $member->delete(); // Retains payments, claims and registration history.

        return redirect()->route('admin.members')
            ->with('success', 'Member removed from the active member list.');
    }

    /*

    |--------------------------------------------------------------------------

    | PENDING MEMBER REGISTRATIONS

    |--------------------------------------------------------------------------

    */



    public function pending()
    {
        $pendingMembers = Member::with('user')
            ->whereNull('registration_checked_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return view(
            'admin.unchecked_registrations',
            compact('pendingMembers')
        );
    }

    public function markRegistrationChecked($id)
    {
        $member = Member::findOrFail($id);

        if ($member->registration_checked_at) {
            return back()->withErrors([
                'registration' => 'This registration has already been checked.',
            ]);
        }

        $member->update([
            'registration_checked_at' => now(),
            'admin_verified_by' => (string) auth()->id(),
        ]);

        return redirect()
            ->route('admin.pending')
            ->with('success', 'Registration marked as checked successfully.');
    }


    /*

    |--------------------------------------------------------------------------

    | ORIGINAL REGISTRATION DETAILS

    |--------------------------------------------------------------------------

    */

    public function registrationDetails($id)

    {

        $member = Member::with([

            'user',

            'dependents',

        ])->findOrFail($id);





        $snapshot = $member->registration_snapshot;





        // Support array-cast and JSON-string snapshots

        if (is_string($snapshot)) {



            $snapshot = json_decode(

                $snapshot,

                true

            );



        }





        $snapshot = is_array($snapshot)

            ? $snapshot

            : [];





        return view(

            'admin.registration_details',

            compact(

                'member',

                'snapshot'

            )

        );

    }





    /*

    |--------------------------------------------------------------------------

    | RENEWALS

    |--------------------------------------------------------------------------

    */



    // Display pending renewals

    public function renewals()
    {
        $renewals = \App\Models\Payment::with('member.user')
            ->where('payment_type', 'Renewal')
            ->where('payment_status', 'Successful')
            ->whereNull('renewal_checked_at')
            ->latest()
            ->get();

        return view(
            'admin.unchecked_renewals',
            compact('renewals')
        );
    }

    /*

    |--------------------------------------------------------------------------

    | CLAIMS

    |--------------------------------------------------------------------------

    */



    // Display pending claims

    public function claims()

    {

        $claims = \App\Models\Claim::where(

            'status',

            'Pending'

        )->get();





        return view(

            'admin.claims',

            compact('claims')

        );

    }





    // Display claim history

    public function claimsHistory()

    {

        $claims = \App\Models\Claim::whereIn(

            'status',

            [

                'Approved',

                'Rejected',

                'Completed',

            ]

        )->get();





        return view(

            'admin.claims_history',

            compact('claims')

        );

    }

    public function claimDetails($id)
    {
        $claim = \App\Models\Claim::with('member.user')
            ->findOrFail($id);

        return view('admin.claim_details', compact('claim'));
    }

    public function viewClaimDocument($id, $type)
    {
        $claim = \App\Models\Claim::findOrFail($id);

        $documents = [
            'member-ic' => $claim->member_ic_document,
            'death-certificate' => $claim->death_certificate_document,
            'burial-permit' => $claim->burial_permit_document,
            'marriage-certificate' => $claim->marriage_certificate_document,
            'birth-certificate' => $claim->birth_certificate_document,
            'bank-statement' => $claim->bank_statement_document,
        ];

        if (!array_key_exists($type, $documents)) {
            abort(404);
        }

        $path = $documents[$type];

        if (
            !$path ||
            !\Illuminate\Support\Facades\Storage::exists($path)
        ) {
            abort(404, 'Document not found.');
        }

        return \Illuminate\Support\Facades\Storage::response($path);
    }

    public function approveClaim($id)
    {
        $claim = \App\Models\Claim::with('member.user')->findOrFail($id);

        if ($claim->status !== 'Pending') {
            return back()->withErrors([
                'claim' => 'This claim has already been processed.',
            ]);
        }

        $claim->update([
            'status' => 'Approved',
            'admin_verified_by' => auth()->id(),
            'verification_date' => now(),
        ]);

        // Send notification to the member
        if ($claim->member?->user) {
            $claim->member->user->notify(
                new SystemNotification(
                    'Claim Approved',
                    'Your Khairat claim for ' . $claim->deceased_name . ' has been approved.'
                )
            );
        }

        return redirect()
            ->route('admin.claims')
            ->with('success', 'Claim approved successfully.');
    }

    public function rejectClaim(Request $request, $id)
    {
        $request->validate([
            'rejection_remark' => 'required|string|max:1000',
        ]);

        $claim = \App\Models\Claim::findOrFail($id);

        if ($claim->status !== 'Pending') {
            return back()->withErrors([
                'claim' => 'This claim has already been processed.',
            ]);
        }

        $claim->update([
            'status' => 'Rejected',
            'admin_verified_by' => auth()->id(),
            'verification_date' => now(),
            'rejection_remark' => $request->rejection_remark,
        ]);

        return redirect()
            ->route('admin.claims')
            ->with('success', 'Claim rejected successfully.');
    }

    /*

    |--------------------------------------------------------------------------

    | STUDENT DOCUMENT VERIFICATION

    |--------------------------------------------------------------------------

    */

    // Securely display a student document

    public function viewStudentDocument($id)
    {
        $dependent = Dependent::findOrFail($id);

        if (
            !$dependent->student_proof_path ||
            !Storage::exists(
                $dependent->student_proof_path
            )
        ) {
            abort(
                404,
                'Document not found.'
            );
        }

        return Storage::response(
            $dependent->student_proof_path
        );
    }

    public function markRenewalChecked($id)
    {
        $payment = Payment::findOrFail($id);

        if ($payment->payment_type !== 'Renewal') {
            return back()->withErrors([
                'renewal' => 'Invalid renewal record.',
            ]);
        }

        if ($payment->payment_status !== 'Successful') {
            return back()->withErrors([
                'renewal' => 'This renewal payment was not successful.',
            ]);
        }

        if ($payment->renewal_checked_at) {
            return back()->withErrors([
                'renewal' => 'This renewal has already been checked.',
            ]);
        }

        $payment->update([
            'renewal_checked_at' => now(),
        ]);

        $member = $payment->member;

        if ($member) {
            $member->update([
                'membership_status' => 'Active',
            ]);
        }

        return redirect()
            ->route('admin.renewals')
            ->with('success', 'Renewal marked as checked successfully.');
    }
}
