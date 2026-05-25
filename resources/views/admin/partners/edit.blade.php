@extends('layouts.admin')

@section('content')

<div class="p-8">

    <div class="mb-8">
        <h1 class="text-3xl font-black text-slate-800">
            Edit Partner
        </h1>
    </div>

    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm p-8">

        <form
            action="{{ route('admin.partners.update', $partner->id) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6">

            @csrf
            @method('PUT')

            <!-- Nama -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">
                    Nama Partner
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $partner->name) }}"
                    class="w-full rounded-2xl border border-slate-200 px-5 py-4">
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

                @if ($partner->logo_url)
                    <img
                        src="{{ asset('storage/partners/' . $partner->logo_url) }}"
                        class="w-24 h-24 object-cover rounded-2xl mt-4">
                @endif
            </div>

            <div class="flex gap-3 pt-4">
                <button
                    type="submit"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                    Update
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