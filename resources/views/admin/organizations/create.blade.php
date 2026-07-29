@extends('layouts.admin')

@section('content')

<div class="p-6">

<h2 class="text-2xl font-bold mb-5">
Tambah Organization
</h2>

<form action="{{ route('admin.organizations.store') }}" method="POST">

@csrf

<div class="mb-4">
    <label>Nama Organization</label>
    <input
        type="text"
        name="name"
        class="border p-2 w-full"
        required>
</div>

<div class="mb-4">
    <label>Deskripsi</label>
    <textarea
        name="description"
        class="border p-2 w-full"></textarea>
</div>

<div class="mb-4">
    <label>Status</label>
    <select
        name="status"
        class="border p-2 w-full">

        <option value="pending">Pending</option>
        <option value="active">Active</option>

    </select>
</div>

<!-- TAMBAHAN -->
<div class="mb-4">
    <label>Email Organizer</label>
    <input
        type="email"
        name="email"
        class="border p-2 w-full"
        required>
</div>

<!-- TAMBAHAN -->
<div class="mb-4">
    <label>Password Organizer</label>
    <input
        type="password"
        name="password"
        class="border p-2 w-full"
        required>
</div>

<button
class="bg-blue-600 text-white px-4 py-2 rounded">

Simpan

</button>

</form>

</div>

@endsection