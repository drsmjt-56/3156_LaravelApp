<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\CertificateMail;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public function preview($transaction)
    {
        $transaction = Transaction::with('event')
            ->findOrFail($transaction);

        $pdf = Pdf::loadView('certificate.certificate', compact('transaction'));

        return $pdf->stream('certificate.pdf');
    }

    public function send($transaction)
{
    $transaction = Transaction::with('event')->findOrFail($transaction);

    Mail::to($transaction->customer_email)
        ->send(new CertificateMail($transaction));

    return redirect()
    ->route('ticket')
    ->with('success', 'E-Certificate berhasil dikirim ke email peserta.');
}
}