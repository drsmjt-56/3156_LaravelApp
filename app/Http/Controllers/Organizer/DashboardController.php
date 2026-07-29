<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        $organization = $user->organization;


        $events = Event::where(
            'organization_id',
            $organization->id
        )->latest()->get();



        $totalEvent = $events->count();



        $totalTicket = Transaction::whereHas('event', function($query) use ($organization){

            $query->where(
                'organization_id',
                $organization->id
            );

        })
        ->count();



        $totalIncome = Transaction::whereHas('event', function($query) use ($organization){

            $query->where(
                'organization_id',
                $organization->id
            );

        })
        ->sum('total_price');



        return view('organizer.organizer-dashboard', compact(
    'organization',
    'events',
    'totalEvent',
    'totalTicket',
    'totalIncome'
));

    }

    public function analytics()
{
    $organization = auth()->user()->organization;

    $transactions = Transaction::whereHas('event', function($query) use ($organization){
        $query->where('organization_id', $organization->id);
    })
    ->whereIn('status',['settlement','success'])
    ->get();


    $totalIncome = $transactions->sum('total_price');

    $totalTransaction = $transactions->count();


    return view('organizer.analytics', compact(
        'organization',
        'totalIncome',
        'totalTransaction'
    ));
}
}