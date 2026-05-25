<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $partners = Partner::when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%$search%");
        })->latest()->get();

        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $logoName = null;

        if ($request->hasFile('logo_url')) {

            $file = $request->file('logo_url');

            $logoName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('storage/partners'), $logoName);
        }

        Partner::create([
            'name' => $request->name,
            'logo_url' => $logoName
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

    public function edit($id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo_url' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $partner = Partner::findOrFail($id);

        $logoName = $partner->logo_url;

        if ($request->hasFile('logo_url')) {

            $file = $request->file('logo_url');

            $logoName = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('storage/partners'), $logoName);
        }

        $partner->update([
            'name' => $request->name,
            'logo_url' => $logoName
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil diupdate');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);

        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus');
    }
}