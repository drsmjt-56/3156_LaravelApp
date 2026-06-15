<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function index()
    {
        $events = \App\Models\Event::with('category')->latest()->paginate(10);
        return view('admin.events.index', compact('events'));
    }

  
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view ('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'poster_path' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster_path')) {
            $file = $request->file('poster_path');
            $filename = time() . "." . $file->getClientOriginalExtension();
            $file->move(
                public_path('storage/event'),
                $filename
            );

            $data['poster_path'] = 'event/' / $filename;
        }

        Event::create($data);

        return redirect()
            ->route('admin.events.index')
            ->with('success', 'Data Event berhasil ditambahkan');
    }

   
    public function show(Event $event)
    {
        $categories = \App\Models\Category::all();

        return view('event-detail', compact('categories', 'event'));
    }

    
    public function edit(Event $event)
    {
        $categories = \App\Models\Category::all();
        return view('admin.events.edit', compact('event',
        'categories'));
    }

   
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
        'category_id' => 'required',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'poster_path' => 'nullable|image|max:2048'
    ]);

        if ($request->hasFile('poster_path')) {

            if ($event->poster_path) {

                $oldFile = public_path('storage/' . $event->poster_path);

                if (File::exists($oldFile)) {
                    File::delete($oldFile);
                }
            }

            $file = $request->file('poster_path');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(
                public_path('storage/event'),
                $filename
            );

            $data['poster_path'] = 'event/' . $filename;
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Data event berhasil dihapus secara permanen.');
    }
}
