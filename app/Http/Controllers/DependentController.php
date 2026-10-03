<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DependentController extends Controller
{
    // Display registered dependents
    public function index()
    {
        $member = Member::where('user_id', Auth::id())
            ->firstOrFail();

        $dependents = $member->dependents()
            ->orderBy('date_of_birth')
            ->get();

        // No automatic birthday checks or database updates.
        return view('member.dependents', compact('dependents'));
    }


    // Upload a missing student document
    public function uploadStudentDocument(Request $request, $id)
    {
        $member = Member::where('user_id', Auth::id())
            ->firstOrFail();

        $dependent = $member->dependents()
            ->where('dependent_id', $id)
            ->firstOrFail();

        // Use the age recorded during registration.
        $age = $dependent->age;

        if (
            $dependent->relationship !== 'Anak' ||
            $age < 21 ||
            $age > 25
        ) {
            return back()->withErrors([
                'student_document' =>
                    'Student documents are only required for children aged 21 to 25 during registration.'
            ]);
        }

        // Only allow uploads when no document exists.
        if ($dependent->student_proof_path) {
            return back()->withErrors([
                'student_document' =>
                    'A student document has already been submitted.'
            ]);
        }

        $request->validate([
            'student_document' =>
                'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $path = $request
            ->file('student_document')
            ->store('student-documents');

        try {
            $dependent->update([
                'is_student' => true,
                'status' => 'Active',
                'student_proof_path' => $path,
            ]);
        } catch (\Throwable $exception) {
            Storage::delete($path);
            throw $exception;
        }

        return redirect()
            ->route('member.dependents')
            ->with(
                'success',
                'Student document uploaded successfully.'
            );
    }


    // View the member's privately stored document
    public function viewStudentDocument($id)
    {
        $member = Member::where('user_id', Auth::id())
            ->firstOrFail();

        $dependent = $member->dependents()
            ->where('dependent_id', $id)
            ->firstOrFail();

        if (
            !$dependent->student_proof_path ||
            !Storage::exists(
                $dependent->student_proof_path
            )
        ) {
            abort(404, 'Document not found.');
        }

        return Storage::response(
            $dependent->student_proof_path
        );
    }
}
