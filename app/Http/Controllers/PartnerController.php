<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnerController extends Controller
{
    public function show(Partner $partner)
{
    $partner->load('events');

    $reviews = \App\Models\Review::with('transaction.event')
        ->whereHas('transaction.event', function ($q) use ($partner) {
            $q->where('partner_id', $partner->id);
        })
        ->latest()
        ->get();

    return view('partners.show', compact(
        'partner',
        'reviews'
    ));
}
}