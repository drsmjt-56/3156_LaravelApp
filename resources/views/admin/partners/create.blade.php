@extends('layouts.admin')

@section('content')

<main class="flex-1 p-10 overflow-y-auto">

    <div class="max-w-2xl bg-white p-8 rounded-[2rem] shadow-sm border">

        <h1 class="text-3xl font-black mb-2">
            Tambah Partner
        </h1>

        <p class="text-slate-500 mb-8">
            Tambahkan partner baru pendukung event.
        </p>

        <form action="{{ route('admin.partners.store') }}" method="POST">

            @csrf

            <!-- NAMA -->
            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Nama Partner
                </label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Masukkan nama partner">

            </div>

            <!-- LOGO -->
            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Logo URL
                </label>

                <input
                    type="text"
                    name="logo_url"
                    class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="https://placehold.co/200x200">

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold hover:bg-indigo-700 transition">

                Simpan Partner
            </button>

        </form>

    </div>

</main>

@endsection