<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
{
    if (Auth::user()->role == 'superadmin') {

        $events = Event::with('category')
            ->latest()
            ->paginate(10);

    } else {

        $events = Event::with('category')
            ->where('organization_id', Auth::user()->organization_id)
            ->latest()
            ->paginate(10);

    }

    return view('admin.events.index', compact('events'));
}

  
    public function create()
    {
        $categories = \App\Models\Category::all();
        $partners = Partner::all();
        return view ('admin.events.create', compact('categories', 'partners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'partner_id' => 'required|exists:partners,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:1',
            'poster' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {

            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        Event::create($data);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Data Event berhasil ditambahkan');
    }

   
    public function show(Event $event)
    {
        $categories = \App\Models\Category::all();

        return view('event-detail', compact('categories','event'));
    }

    
    public function edit(Event $event)
    {
        $categories = \App\Models\Category::all();
        $partners = Partner::all();

        return view('admin.events.edit', compact('event',
        'categories', 'partners'));
    }

   
    public function update(Request $request, Event $event)
    {

    $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'partner_id' => 'required|exists:partners,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:date',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:1',
        'poster' => 'nullable|image|max:2048'
    ]);

    if ($request->hasFile('poster')) {

        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }

        $data['poster_path'] = $request
            ->file('poster')
            ->store('posters', 'public');
    }

    $event->update($data);

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->poster_path) {
        Storage::disk('public')->delete($event->poster_path);
    }

    $event->delete();

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Data event berhasil dihapus.');
    }
}
