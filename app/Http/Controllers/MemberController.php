<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Notifications\MembershipExpiryReminder;

class MemberController extends Controller
{
    // NORMAL USER DASHBOARD
    public function normalDashboard()
    {
        $member = Member::where('user_id', auth()->id())->first();

        return view('normal.dashboard', compact('member'));
    }

    // DISPLAY REGISTRATION FORM
    public function showRegisterKhairat()
    {
        $existingRegistration = Member::where(
            'user_id',
            Auth::id()
        )->exists();

        if ($existingRegistration) {
            return redirect()
                ->route('normal.dashboard')
                ->with(
                    'success',
                    'You have already submitted your registration.'
                );
        }

        return view('normal.register_khairat');
    }

    // SAVE KHAIRAT REGISTRATION
    public function registerKhairat(Request $request)
    {
        // Prevent duplicate registrations
        if (Member::where('user_id', Auth::id())->exists()) {
            return redirect()
                ->route('normal.dashboard')
                ->with(
                    'success',
                    'You have already submitted your registration.'
                );
        }

        // Validate applicant and dependent information
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'ic_number' => 'required|string|max:15',
            'phone' => 'required|string|max:20',
            'birth_date' => 'required|date|before_or_equal:today',
            'email' => 'required|email|max:255',
            'address' => 'required|string',

            'heir_name' => 'required|string|max:255',
            'heir_phone' => 'required|string|max:20',

            'bank_name' => [
                'required',
                'in:Maybank,CIMB Bank,Public Bank,RHB Bank,Hong Leong Bank,Bank Islam,Bank Rakyat,BSN',
            ],

            'demo_payment_confirmed' => 'required|in:1',

            'dependents' => 'sometimes|array',

            'dependents.*.full_name' => 'required|string|max:255',
            'dependents.*.ic_number' => 'required|string|max:15',
            'dependents.*.birth_date' => 'required|date|before_or_equal:today',

            'dependents.*.relationship' =>
                'required|in:Anak,Isteri,Suami',

            'dependents.*.student_status' =>
                'nullable|in:Studying,Not Studying',

            'dependents.*.student_document' =>
                'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        // Validate child age and student eligibility
        foreach ($validated['dependents'] ?? [] as $index => $dependent) {

            if ($dependent['relationship'] !== 'Anak') {
                continue;
            }

            $age = Carbon::parse(
                $dependent['birth_date']
            )->age;

            if ($age >= 26) {
                throw ValidationException::withMessages([
                    "dependents.$index.birth_date" =>
                        'Children aged 26 and above are not eligible.'
                ]);
            }

            if ($age >= 21) {

                if (
                    ($dependent['student_status'] ?? null)
                    !== 'Studying'
                ) {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_status" =>
                            'Children aged 21 to 25 must still be studying.'
                    ]);
                }

                if (
                    !$request->hasFile(
                        "dependents.$index.student_document"
                    )
                ) {
                    throw ValidationException::withMessages([
                        "dependents.$index.student_document" =>
                            'Please upload a student verification document.'
                    ]);
                }
            }
        }

        $uploadedFiles = [];

        try {

            DB::transaction(function () use (
                $request,
                $validated,
                &$uploadedFiles
            ) {


                // Save applicant information
                $member = Member::create([
                    'user_id' => Auth::id(),

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
                ]);

                // Save simulated FPX registration payment
                $reference = 'FPX-REG-' .
                    now()->format('YmdHis') . '-' .
                    strtoupper(bin2hex(random_bytes(4)));

                $payment = Payment::create([
                    'member_id' => $member->member_id,
                    'payment_date' => now()->toDateString(),
                    'amount' => 60.00,
                    'payment_method' => 'Simulated FPX',
                    'payment_type' => 'Registration',
                    'receipt_number' => $reference,
                    'bank_name' => $validated['bank_name'],
                    'payment_status' => 'Successful',
                    'transaction_reference' => $reference,
                ]);

                $originalDependents = [];

                // Save each dependent
                foreach (
                    $validated['dependents'] ?? []
                    as $index => $dependentData
                ) {

                    $age = Carbon::parse(
                        $dependentData['birth_date']
                    )->age;

                    $requiresVerification =
                        $dependentData['relationship'] === 'Anak'
                        && $age >= 21
                        && $age <= 25;

                    $documentPath = null;

                    if ($requiresVerification) {

                        $documentPath = $request
                            ->file(
                                "dependents.$index.student_document"
                            )
                            ->store(
                                'student-documents'
                            );

                        $uploadedFiles[] = $documentPath;
                    }

                    $dependent = $member->dependents()->create([
                        'full_name' => $dependentData['full_name'],

                        'ic_number' => $dependentData['ic_number'],

                        'date_of_birth' =>
                            $dependentData['birth_date'],

                        'age' => $age,

                        'relationship' =>
                            $dependentData['relationship'],

                        
                        'status' => 'Active',

                        'is_student' => $requiresVerification,

                        'student_proof_path' => $documentPath,

                    ]);

                    // Keep an unchanged copy of the original data
                    $originalDependents[] = [
                        'dependent_id' => $dependent->dependent_id,

                        'full_name' => $dependentData['full_name'],

                        'ic_number' => $dependentData['ic_number'],

                        'birth_date' => $dependentData['birth_date'],

                        'relationship' =>
                            $dependentData['relationship'],

                        'student_status' =>
                            $requiresVerification
                                ? 'Studying'
                                : null,

                        'student_document_path' => $documentPath,
                    ];
                }

                // Save the original registration snapshot
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
                            'payment_date' => $payment->payment_date,
                            'payment_method' => 'Simulated FPX',
                            'bank_name' => $validated['bank_name'],
                            'payment_id' => $payment->payment_id,
                            'receipt_number' => $reference,
                        ],

                        'registration_date' =>
                            now()->toDateString(),
                    ],
                ]);

                // Automatically change the user role after successful registration payment
                $user = Auth::user();

                $user->update([
                    'role' => 'member',
                ]);

                });

        } catch (\Throwable $exception) {

            // Clean up uploaded files if database saving fails
            foreach ($uploadedFiles as $path) {
                Storage::delete($path);
            }

            throw $exception;
        }

        return redirect()
        ->route('member.dashboard')
        ->with(
            'success',
            'Registration and payment completed successfully. Your membership is now active.'
        );
    }

    // MEMBER DASHBOARD
    public function memberDashboard()
    {
        $member = auth()->user()->member;

        if (!$member) {
            abort(403);
        }

        // Automatically deactivate expired membership
        if (
            $member->membership_status === 'Active' &&
            $member->membership_expiry_date &&
            Carbon::parse($member->membership_expiry_date)->isPast()
        ) {
            $member->membership_status = 'Inactive';
            $member->save();
        }

        // Membership expiry reminder
        if (
            $member->membership_status === 'Active' &&
            $member->membership_expiry_date
        ) {
            $expiryDate = Carbon::parse($member->membership_expiry_date);
            $daysLeft = today()->diffInDays($expiryDate, false);

            if ($daysLeft >= 1 && $daysLeft <= 7) {

                $alreadyNotified = auth()->user()
                    ->notifications()
                    ->where('data->type', 'membership_expiry')
                    ->where('data->expiry_date', $member->membership_expiry_date)
                    ->exists();

                if (!$alreadyNotified) {
                    auth()->user()->notify(
                        new MembershipExpiryReminder(
                            $daysLeft,
                            $member->membership_expiry_date
                        )
                    );
                }
            }
        }

        $totalPaid = $member->payments()
            ->whereIn('payment_status', ['Successful', 'Approved'])
            ->sum('amount');

        $dependentsCount = $member->dependents()
            ->where('status', 'Active')
            ->count();

        $recentPayments = $member->payments()
            ->latest('payment_date')
            ->take(5)
            ->get();

        $recentClaims = $member->claims()
            ->latest('claim_date')
            ->take(5)
            ->get();

        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->take(5)
            ->get();

        return view('member.dashboard', compact(
            'member',
            'totalPaid',
            'dependentsCount',
            'recentPayments',
            'recentClaims',
            'notifications'
        ));
    }

    // MEMBER PROFILE
    public function profile()
    {
        $member = Member::where('user_id', Auth::id())
            ->firstOrFail();

        return view('member.profile', compact('member'));
    }

    // UPDATE PROFILE
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $member = Member::where('user_id', $user->id)
            ->firstOrFail();

        $validated = $request->validate([
            'phone' => 'required|string|max:20',

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],

            'address' => 'required|string|max:1000',
        ]);

        DB::transaction(function () use (
            $user,
            $member,
            $validated
        ) {
            // Update login/contact email
            $user->email = $validated['email'];
            $user->save();

            // Update current member information
            $member->phone = $validated['phone'];
            $member->email = $validated['email'];
            $member->address = $validated['address'];
            $member->save();
        });

        return redirect()
            ->route('member.profile')
            ->with('success', 'Profile updated successfully!');
    }

    // UPDATE MEMBER PROFILE PICTURE
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = $request->user();

        $oldPhoto = $user->profile_photo;

        $newPhoto = $request->file('profile_photo')
            ->store('profile-photos', 'public');

        try {
            $user->profile_photo = $newPhoto;
            $user->save();
        } catch (\Throwable $e) {
            Storage::disk('public')->delete($newPhoto);
            throw $e;
        }

        if ($oldPhoto) {
            Storage::disk('public')->delete($oldPhoto);
        }

        return redirect()
            ->route('member.profile')
            ->with('success', 'Profile picture updated successfully!');
    }

    // DISPLAY ORIGINAL REGISTRATION
    public function viewRegistration()
    {
        $member = Member::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $registrationPayment = $member->payments()
            ->where('payment_type', 'Registration')
            ->where('payment_status', 'Successful')
            ->first();

        return view(
            'member.registration',
            compact('member', 'registrationPayment')
        );
    }
    
    // ADMIN PENDING MEMBERS
    public function pendingMembers()
    {
        $pendingMembers = Member::where(
            'membership_status',
            'Inactive'
        )
        ->orderBy('created_at', 'desc')
        ->get();

        return view(
            'admin.members.pending',
            compact('pendingMembers')
        );
    }

    // Display Normal User Profile
    public function normalProfile()
    {
        return view('normal.profile');
    }

    // Update Normal User Profile
    public function updateNormalProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'
                . $request->user()->getKey(),
        ]);

        $user = $request->user();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()
            ->route('normal.profile')
            ->with('success', 'Profile updated successfully!');
    }
}