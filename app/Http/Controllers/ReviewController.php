<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function create($transaction_id)
{
    $transaction = Transaction::with('event', 'review')
        ->findOrFail($transaction_id);

    // Harus transaksi sukses
    if (!in_array(strtolower($transaction->status), ['success', 'settlement'])) {
        return back()->with('error', 'Transaksi belum berhasil.');
    }

    // Sudah pernah review
    if ($transaction->review) {
        return back()->with('error', 'Anda sudah memberikan ulasan.');
    }

    // Hanya boleh mulai H+1 (berdasarkan tanggal, bukan jam)
    $bolehReview = now()->toDateString() >=
        Carbon::parse(
            $transaction->event->end_date ?? $transaction->event->date
        )
        ->addDay()
        ->toDateString();

    if (!$bolehReview) {
        return back()->with(
            'error',
            'Review baru bisa diberikan H+1 setelah acara selesai.'
        );
    }

    return view('review.create', compact('transaction'));
}

    public function store(Request $request, $transaction_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        Review::create([
    'transaction_id' => $transaction_id,
    'rating' => $request->rating,
    'review' => $request->review,
]);

return redirect()
    ->route('home')
    ->with('success', 'Terima kasih, ulasan berhasil dikirim.');
    }
}