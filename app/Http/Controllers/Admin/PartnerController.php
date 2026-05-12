<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    // READ
    public function index()
    {
        $partners = Partner::all();

        return view('admin.partners.index', compact('partners'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.partners.create');
    }

    // STORE DATA
    public function store(Request $request)
    {
        Partner::create([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Data partner berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    // UPDATE DATA
    public function update(Request $request, Partner $partner)
    {
        $partner->update([
            'name' => $request->name,
            'logo_url' => $request->logo_url,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Data partner berhasil diupdate!');
    }

    // DELETE DATA
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Data partner berhasil dihapus!');
    }
}