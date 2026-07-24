<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request) 
    {
        $categories = Category::all();
        $partners = Partner::all();

        $query = Event::with('category')
        ->where('date', '>=', now())
        ->orderBy('date', 'asc');

    if ($request->has('category') && $request->category != '') {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }
    $events = $query->get();
    return view('welcome', compact('events', 'categories', 'partners'));
    }

    public function ticket()
{
    if (!auth()->check()) {

        session([
            'redirect_after_login' => route('ticket')
        ]);

        return redirect()->route('user.login');
    }

    $transactions = Transaction::with('event', 'review')
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    //dd($transactions->toArray());

    return view('my-ticket', compact('transactions'));
}
}
