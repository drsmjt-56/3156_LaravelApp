@extends('layouts.organizer')

@section('title', 'Tambah Event')
@section('page_title', 'Tambah Event')

@section('content')

<div class="flex-1 p-10">

    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            Tambah Event
        </h1>

        <p class="text-slate-500 mt-2">
            Tambahkan event baru untuk organisasi Anda.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow p-8">

        <form action="{{ route('organizer.events.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="grid grid-cols-2 gap-6">

                {{-- Kategori --}}
                <div>
                    <label class="font-semibold">Kategori</label>

                    <select name="category_id"
                        class="w-full border rounded-xl p-3 mt-2">

                        @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                        @endforeach

                    </select>
                </div>

                {{-- Partner --}}
                <div>
                    <label class="font-semibold">Partner</label>

                    <select name="partner_id"
                        class="w-full border rounded-xl p-3 mt-2">

                        @foreach($partners as $partner)

                        <option value="{{ $partner->id }}">
                            {{ $partner->name }}
                        </option>

                        @endforeach

                    </select>
                </div>

                {{-- Judul --}}
                <div class="col-span-2">
                    <label class="font-semibold">Judul Event</label>

                    <input
                        type="text"
                        name="title"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Deskripsi --}}
                <div class="col-span-2">
                    <label class="font-semibold">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border rounded-xl p-3 mt-2"></textarea>
                </div>

                {{-- Tanggal Mulai --}}
                <div>
                    <label class="font-semibold">
                        Tanggal Mulai
                    </label>

                    <input
                        type="datetime-local"
                        name="date"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Tanggal Selesai --}}
                <div>
                    <label class="font-semibold">
                        Tanggal Selesai
                    </label>

                    <input
                        type="datetime-local"
                        name="end_date"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Lokasi --}}
                <div>
                    <label class="font-semibold">
                        Lokasi
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Harga --}}
                <div>
                    <label class="font-semibold">
                        Harga Tiket
                    </label>

                    <input
                        type="number"
                        name="price"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Stock --}}
                <div>
                    <label class="font-semibold">
                        Stock Tiket
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="w-full border rounded-xl p-3 mt-2"
                        required>
                </div>

                {{-- Poster --}}
                <div>
                    <label class="font-semibold">
                        Poster
                    </label>

                    <input
                        type="file"
                        name="poster"
                        class="w-full border rounded-xl p-3 mt-2">
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('organizer.events.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-300">
                    Batal
                </a>

                <button
                    class="px-6 py-3 rounded-xl bg-indigo-600 text-white">

                    Simpan Event

                </button>

            </div>

        </form>

    </div>

</div>

@endsection