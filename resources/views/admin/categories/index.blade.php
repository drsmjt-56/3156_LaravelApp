@extends('layouts.admin')

@section('content')
<main class="flex-1 p-10 overflow-y-auto">

    <!-- HEADER -->
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Kelola Kategori</h1>
            <p class="text-slate-500 font-medium">Atur kategori event di sini.</p>
        </div>

        <!-- TOMBOL TAMBAH -->
        <button
            class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">
            + Tambah Kategori
        </button>
    </header>

    <!-- TABLE -->
    <div class="bg-white rounded-[2rem] border shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-xs">
                <tr>
                    <th class="px-8 py-4 w-16">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                <!-- DATA 1 -->
                <tr class="hover:bg-slate-50">
                    <td class="px-8 py-6">1</td>
                    <td class="px-8 py-6 font-semibold">Seminar</td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Edit</button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                        </div>
                    </td>
                </tr>

                <!-- DATA 2 -->
                <tr class="hover:bg-slate-50">
                    <td class="px-8 py-6">2</td>
                    <td class="px-8 py-6 font-semibold">Konser</td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Edit</button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                        </div>
                    </td>
                </tr>

                <!-- DATA 3 -->
                <tr class="hover:bg-slate-50">
                    <td class="px-8 py-6">3</td>
                    <td class="px-8 py-6 font-semibold">Workshop</td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <button class="px-4 py-2 bg-indigo-500 text-white rounded-lg">Edit</button>
                            <button class="px-4 py-2 bg-red-500 text-white rounded-lg">Hapus</button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</main>
@endsection