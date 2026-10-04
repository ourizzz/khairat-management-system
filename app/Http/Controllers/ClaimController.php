<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        return view('member.claim');
    }

    public function store(Request $request)
    {
        $request->validate([
            'claim_type' => 'required|in:member,dependant',
            'deceased_name' => 'required|string|max:255',
            'deceased_ic' => 'required|string|max:50',
            'death_date' => 'required|date',
            'place_of_death' => 'required|string|max:255',
            'cause_of_death' => 'nullable|string|max:255',
            'relationship' => 'required|string|max:100',
            'death_cert_no' => 'required|string|max:100',

            'member_ic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'death_certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'burial_permit' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'marriage_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
            'bank_statement' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        $member = auth()->user()->member;

        if (!$member) {
            return back()->withErrors([
                'claim' => 'Member record not found.',
            ]);
        }

        if ($member->membership_status !== 'Active') {
            return back()->withErrors([
                'claim' => 'Only active members can submit a claim.',
            ]);
        }

        // Prevent more than one pending claim at the same time
        if ($member->claims()->where('status', 'Pending')->exists()) {
            return back()->withErrors([
                'claim' => 'You already have a pending claim.',
            ]);
        }

        $storeDocument = function ($field) use ($request) {
            if (!$request->hasFile($field)) {
                return null;
            }

            return $request->file($field)
                ->store('claim-documents');
        };

        $member->claims()->create([
            'claim_date' => now(),
            'claim_type' => $request->claim_type,

            'deceased_name' => $request->deceased_name,
            'deceased_ic' => $request->deceased_ic,
            'date_of_death' => $request->death_date,
            'place_of_death' => $request->place_of_death,
            'cause_of_death' => $request->cause_of_death,
            'relationship' => $request->relationship,

            'death_certificate_no' => $request->death_cert_no,

            'member_ic_document' => $storeDocument('member_ic'),
            'death_certificate_document' => $storeDocument('death_certificate'),
            'burial_permit_document' => $storeDocument('burial_permit'),
            'marriage_certificate_document' => $storeDocument('marriage_certificate'),
            'birth_certificate_document' => $storeDocument('birth_certificate'),
            'bank_statement_document' => $storeDocument('bank_statement'),

            'status' => 'Pending',
        ]);

        return redirect()
            ->route('member.claim')
            ->with(
                'success',
                'Claim submitted successfully and is waiting for admin approval.'
            );
    }
}