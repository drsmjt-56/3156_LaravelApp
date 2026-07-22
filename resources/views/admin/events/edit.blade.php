@extends('layouts.admin')

@section('content')

    <main class="flex-1 p-10 overflow-y-auto">
        <!-- HEADER -->
        <header class="mb-10">
            <h1 class="text-3xl font-black">
                Edit Event
            </h1>
            <p class="mt-2 font-medium text-slate-500">
                Perbarui informasi event yang dipilih.
            </p>
        </header>

        <!-- FORM -->
        <div class="rounded-[2.5rem] border border-slate-100 bg-white p-10 shadow-sm">
            @if ($errors->any())
                <div class="mb-6 rounded-xl bg-red-100 p-4 text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-8">
                @csrf
                @method('PUT')

                <!-- TITLE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Judul Event
                    </label>

                    <input type="text" name="title" value="{{ old('title', $event->title) }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Kategori
                    </label>

                    <select name="category_id"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $event->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- PARTNER -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Penyelenggara
                    </label>

                    <select name="partner_id"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

                        @foreach ($partners as $partner)
                            <option value="{{ $partner->id }}" {{ $event->partner_id == $partner->id ? 'selected' : '' }}>
                                {{ $partner->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- DESCRIPTION -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Deskripsi
                    </label>

                    <textarea name="description" rows="5"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">{{ old('description', $event->description) }}</textarea>
                </div>

                <!-- START DATE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Tanggal Mulai Event
                    </label>

                    <input type="datetime-local" name="date"
                        value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- END DATE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Tanggal Selesai Event
                    </label>

                    <input type="datetime-local" name="end_date"
                        value="{{ old('end_date', $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : '') }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- LOCATION -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Lokasi
                    </label>

                    <input type="text" name="location" value="{{ old('location', $event->location) }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- PRICE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Harga Tiket
                    </label>

                    <input type="number" name="price" value="{{ old('price', $event->price) }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

                    @error('price')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- STOCK -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Stok Tiket
                    </label>

                    <input type="number" name="stock" value="{{ old('stock', $event->stock) }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

                    @error('stock')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- POSTER -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Poster Event
                    </label>

                    @if ($event->poster_path)
                        <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}"
                            class="mb-4 h-40 rounded-2xl object-cover">
                    @endif

                    <input type="file" name="poster"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- BUTTON -->
                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="rounded-2xl bg-indigo-600 px-8 py-4 font-bold text-white shadow-lg shadow-indigo-100 transition hover:bg-indigo-700 active:scale-95">
                        Update Event
                    </button>

                    <a href="{{ route('admin.events.index') }}"
                        class="rounded-2xl border border-slate-200 px-8 py-4 font-bold text-slate-600 transition hover:bg-slate-100">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>

@endsection
