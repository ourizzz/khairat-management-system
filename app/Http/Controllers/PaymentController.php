<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index()
    {
        return view('member.renewal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string|max:255',
        ]);

        $member = auth()->user()->member;

        if (!$member) {
            return back()->withErrors([
                'renewal' => 'Member record not found.',
            ]);
        }

        DB::transaction(function () use ($request, $member) {

            $reference = 'RNW-' . now()->format('YmdHis') . '-' . $member->member_id;

            // Simulated FPX payment is completed immediately
            $member->payments()->create([
                'payment_date' => now(),
                'amount' => 40.00,
                'payment_method' => 'Simulated FPX',
                'payment_type' => 'Renewal',
                'receipt_number' => $reference,
                'bank_name' => $request->bank_name,
                'payment_status' => 'Successful',
                'transaction_reference' => $reference,
            ]);

            // Extend membership by one year
            $currentExpiry = $member->membership_expiry_date
                ? Carbon::parse($member->membership_expiry_date)
                : now();

            $startDate = $currentExpiry->isFuture()
                ? $currentExpiry
                : now();

            $member->update([
                'membership_expiry_date' => $startDate->copy()->addYear()->toDateString(),
                'membership_status' => 'Active',
            ]);
        });

        return redirect()
            ->route('member.renewal')
            ->with(
                'success',
                'Renewal payment completed successfully. Your membership has been extended for one year.'
            );
    }

    public function history()
    {
        $member = auth()->user()->member;

        if (!$member) {
            abort(403);
        }

        $payments = $member->payments()
            ->latest('payment_date')
            ->get();

        return view('member.history', compact('payments'));
    }
}