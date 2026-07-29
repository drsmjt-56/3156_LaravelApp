<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Partner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where(
            'organization_id',
            Auth::user()->organization_id
        )
        ->latest()
        ->paginate(10);

        return view('organizer.events.index', compact('events'));
    }


    public function create()
    {
        $categories = Category::all();
        $partners = Partner::all();

        return view('organizer.events.create',
        compact('categories','partners'));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            'category_id'=>'required',
            'partner_id'=>'required',
            'title'=>'required',
            'description'=>'nullable',
            'date'=>'required|date',
            'end_date'=>'required|date',
            'location'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|numeric',
            'poster'=>'nullable|image'
        ]);


        $data['organization_id'] =
        Auth::user()->organization_id;


        if($request->hasFile('poster')){
            $data['poster_path'] =
            $request->file('poster')
            ->store('posters','public');
        }


        Event::create($data);


        return redirect()
        ->route('organizer.events.index')
        ->with('success','Event berhasil dibuat');
    }


    public function edit(Event $event)
    {
        abort_if(
            $event->organization_id != Auth::user()->organization_id,
            403
        );


        $categories = Category::all();
        $partners = Partner::all();


        return view('organizer.events.edit',
        compact(
            'event',
            'categories',
            'partners'
        ));
    }



    public function update(Request $request, Event $event)
    {

        abort_if(
            $event->organization_id != Auth::user()->organization_id,
            403
        );


       $data = $request->validate([
    'category_id'=>'required',
    'partner_id'=>'required',
    'title'=>'required',
    'description'=>'nullable',
    'date'=>'required|date',
    'end_date'=>'required|date',
    'location'=>'required',
    'price'=>'required|numeric',
    'stock'=>'required|numeric',
    'poster'=>'nullable|image', 
]);


        // Jika organizer mengupload poster baru
if ($request->hasFile('poster')) {

    $data['poster_path'] = $request->file('poster')
        ->store('posters', 'public');
}
        $event->update($data);


        return redirect()
        ->route('organizer.events.index')
        ->with('success','Event diperbarui');
    }



    public function destroy(Event $event)
    {

        abort_if(
            $event->organization_id != Auth::user()->organization_id,
            403
        );


        $event->delete();


        return redirect()
        ->route('organizer.events.index')
        ->with('success','Event dihapus');
    }
}