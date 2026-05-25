@extends('layouts.admin')

@section('content')

<div class="p-8">

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800">
            Tambah Partner
        </h1>

        <p class="text-slate-500 mt-2">
            Tambahkan partner pendukung platform.
        </p>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form
            action="{{ route('admin.partners.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Nama Partner
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Masukkan nama partner">

                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Logo Partner
                </label>

                <input
                    type="file"
                    name="logo_url"
                    class="w-full rounded-2xl border border-slate-200 px-5 py-4">

                @error('logo_url')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>
            <!-- Button -->
            <div class="flex gap-3 pt-4">

                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
                    Simpan
                </button>

                <a
                    href="{{ route('admin.partners.index') }}"
                    class="px-6 py-3 bg-slate-100 text-slate-700 rounded-2xl font-bold hover:bg-slate-200 transition">
                    Kembali
                </a>
            </div>
        </form>
    </div>
</div>

@endsection