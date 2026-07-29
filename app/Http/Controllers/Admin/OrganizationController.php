<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\User;

class OrganizationController extends Controller
{
   public function index()
{
    $organizations = Organization::with([
        'events.transactions',
        'users'
    ])->latest()->paginate(10);

    return view('admin.organizations.index', compact('organizations'));
}

public function show(Organization $organization)
{
    $organization->load([
        'events.transactions',
        'users'
    ]);

    return view(
        'admin.organizations.show',
        compact('organization')
    );
}

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {

    $request->validate([
    'name' => 'required|max:255',
    'description' => 'nullable',
    'status' => 'required|in:active,pending',

    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:8',
]);    

       $organization = Organization::create([
    'name'=>$request->name,
    'description'=>$request->description,
    'status'=>$request->status,
]);


User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>bcrypt($request->password),
    'role'=>'organizer',
    'organization_id'=>$organization->id
]);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success','Organization berhasil ditambahkan.');
    }

    public function edit(Organization $organization)
    {
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'nullable',
            'status'=>'required|in:active,pending',
        ]);

        $organization->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()
            ->route('admin.organizations.index')
            ->with('success','Organization berhasil diperbarui.');
    }

    public function approve(Organization $organization)
{
    $organization->update([
        'status' => 'active'
    ]);

    return redirect()
        ->route('admin.organizations.index')
        ->with('success', 'Organizer berhasil diaktifkan.');
}

    public function destroy(Organization $organization)
    {
        $organization->delete();

        return redirect()
            ->route('admin.organizations.index')
            ->with('success','Organization berhasil dihapus.');
    }
}