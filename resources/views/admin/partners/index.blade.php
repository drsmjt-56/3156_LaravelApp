@extends('layouts.admin')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Kelola Partner</h1>

            <p class="text-slate-500 font-medium">
                Atur data partner pendukung event di sini.
            </p>
        </div>

        <!-- TOMBOL TAMBAH -->
        <a
            href="{{ route('admin.partners.create') }}"
            class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

            + Tambah Partner
        </a>
    </header>

    <!-- ALERT SUCCESS -->
    @if (session('success'))

        <div class="mb-6 px-6 py-4 bg-green-100 text-green-700 border border-green-200 rounded-2xl">
            {{ session('success') }}
        </div>

    @endif

    <!-- TABLE -->
    <div class="bg-white rounded-[2rem] border shadow-sm overflow-hidden">

        <table class="w-full text-left border-collapse">

            <thead class="bg-slate-50 text-slate-400 uppercase text-xs">

                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>

            </thead>

            <tbody class="divide-y">

                @foreach ($partners as $partner)

                <tr class="hover:bg-slate-50">

                    <!-- NOMOR -->
                    <td class="px-8 py-6">
                        {{ $loop->iteration }}
                    </td>

                    <!-- LOGO -->
                    <td class="px-8 py-6">

                        <img
                            src="{{ $partner->logo_url }}"
                            alt="{{ $partner->name }}"
                            class="w-16 h-16 rounded-xl object-cover border">

                    </td>

                    <!-- NAMA PARTNER -->
                    <td class="px-8 py-6 font-semibold">
                        {{ $partner->name }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-8 py-6">

                        <div class="flex gap-2">

                            <button
                                class="px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">

                                Edit
                            </button>

                            <button
                                class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">

                                Hapus
                            </button>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</main>
@endsectionsdu