@extends('layouts.organizer')

@section('title', 'Edit Event')
@section('page_title', 'Edit Event')

@section('content')

<div class="flex-1 p-10">

    <div class="mb-8">
        <h1 class="text-3xl font-bold">
            Edit Event
        </h1>

        <p class="text-slate-500 mt-2">
            Perbarui informasi event organisasi Anda.
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow p-8">

        <form action="{{ route('organizer.events.update', $event->id) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6">

                {{-- Kategori --}}
                <div>
                    <label class="font-semibold">Kategori</label>

                    <select name="category_id"
                        class="w-full border rounded-xl p-3 mt-2">

                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Penyelenggara --}}
                <div>
                    <label class="font-semibold">
                        Penyelenggara
                    </label>

                    <input
                        type="text"
                        value="{{ auth()->user()->organization->name }}"
                        class="w-full border rounded-xl p-3 mt-2 bg-gray-100"
                        readonly>
                </div>

                {{-- Judul --}}
                <div class="col-span-2">
                    <label class="font-semibold">
                        Judul Event
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title', $event->title) }}"
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
                        class="w-full border rounded-xl p-3 mt-2">{{ old('description', $event->description) }}</textarea>
                </div>

                {{-- Tanggal Mulai --}}
                <div>
                    <label class="font-semibold">
                        Tanggal Mulai
                    </label>

                    <input
                        type="datetime-local"
                        name="date"
                        value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"
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
                        value="{{ \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') }}"
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
                        value="{{ old('location', $event->location) }}"
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
                        value="{{ old('price', $event->price) }}"
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
                        value="{{ old('stock', $event->stock) }}"
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

                    @if($event->poster)
                        <img src="{{ asset('storage/' . $event->poster) }}"
                            alt="Poster Event"
                            class="w-40 mt-4 rounded-lg border">
                    @endif
                </div>

            </div>

            <div class="flex justify-end gap-3 mt-8">

                <a href="{{ route('organizer.events.index') }}"
                    class="px-6 py-3 rounded-xl bg-gray-300 hover:bg-gray-400 transition">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-6 py-3 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">

                    Update Event

                </button>

            </div>

        </form>

    </div>

</div>

@endsection