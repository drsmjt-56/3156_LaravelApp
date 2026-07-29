@extends('layouts.admin')

@section('content')
    <main class="flex-1 p-10 overflow-y-auto">
        <!-- HEADER -->
        <header class="mb-10">
            <h1 class="text-3xl font-black">
                Tambah Event
            </h1>
            <p class="mt-2 font-medium text-slate-500">
                Tambahkan event baru untuk platform.
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

            <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- TITLE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Judul Event
                    </label>

                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul event"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- CATEGORY -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Kategori
                    </label>

                    <select name="category_id"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

                        <option value="">-- Pilih Kategori --</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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

                        <option value="">-- Pilih Penyelenggara --</option>

                        @foreach ($partners as $partner)
                            <option value="{{ $partner->id }}" {{ old('partner_id') == $partner->id ? 'selected' : '' }}>
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

                    <textarea name="description" rows="5" placeholder="Masukkan deskripsi event"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">{{ old('description') }}</textarea>
                </div>

                <!-- START DATE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Tanggal Mulai Event
                    </label>

                    <input type="date" name="date" value="{{ old('date') }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- END DATE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Tanggal Selesai Event
                    </label>

                    <input type="date" name="end_date" value="{{ old('end_date') }}"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- LOCATION -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Lokasi
                    </label>
                    <input type="text" name="location" value="{{ old('location') }}" placeholder="Masukkan lokasi event"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- PRICE -->
                <div>
                    <label class="mb-3 block font-bold text-slate-700">
                        Harga Tiket
                    </label>

                    <div class="mb-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" id="is_free">

                            <span class="font-medium text-green-600">
                                Event Gratis
                            </span>
                        </label>
                    </div>

                    <input type="number" id="price" name="price" value="{{ old('price') }}"
                        placeholder="Contoh : 50000"
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

                    <input type="number" name="stock" value="{{ old('stock') }}" placeholder="Masukkan jumlah stok"
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

                    <input type="file" name="poster" accept="image/*"
                        class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">
                </div>

                <!-- BUTTON -->
                <div class="flex gap-4 pt-4">
                    <button type="submit"
                        class="rounded-2xl bg-indigo-600 px-8 py-4 font-bold text-white shadow-lg shadow-indigo-100 transition hover:bg-indigo-700 active:scale-95">
                        Simpan Event
                    </button>

                    <a href="{{ route('admin.events.index') }}"
                        class="rounded-2xl border border-slate-200 px-8 py-4 font-bold text-slate-600 transition hover:bg-slate-100">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const free = document.getElementById('is_free');
            const price = document.getElementById('price');

            free.addEventListener('change', function() {

                if (this.checked) {

                    price.value = 0;
                    price.readOnly = true;
                    price.classList.add('bg-gray-100');

                } else {

                    price.value = '';
                    price.readOnly = false;
                    price.classList.remove('bg-gray-100');

                }

            });

        });
    </script>
@endsection
