<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\Review;

class OrganizationController extends Controller
{
    public function show(Organization $organization)
    {
        $organization->load('events');

        $reviews = Review::with('transaction.event')
            ->whereHas('transaction.event', function ($q) use ($organization) {
                $q->where('organization_id', $organization->id);
            })
            ->latest()
            ->get();

        return view('organizations.show', compact(
            'organization',
            'reviews'
        ));
    }
}