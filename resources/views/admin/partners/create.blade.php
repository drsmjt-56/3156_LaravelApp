@extends('layouts.admin')

@section('content')

<main class="flex-1 p-10 overflow-y-auto">

    <!-- HEADER -->
    <header class="mb-10">

        <h1 class="text-3xl font-black">
            Tambah Partner
        </h1>

        <p class="mt-2 font-medium text-slate-500">
            Tambahkan partner baru pendukung platform.
        </p>

    </header>

    <!-- FORM -->
    <div class="rounded-[2.5rem] border border-slate-100 bg-white p-10 shadow-sm">

        <form
            action="{{ route('admin.partners.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-8">

            @csrf

            <!-- NAME -->
            <div>

                <label class="mb-3 block font-bold text-slate-700">
                    Nama Partner
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama partner"
                    class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

            </div>

            <!-- LOGO -->
            <div>

                <label class="mb-3 block font-bold text-slate-700">
                    Logo Partner
                </label>

                <input
                    type="file"
                    name="logo_url"
                    class="w-full rounded-2xl border border-slate-200 px-5 py-4 focus:border-indigo-500 focus:outline-none">

            </div>

            <!-- BUTTON -->
            <div class="flex gap-4 pt-4">

                <button
                    type="submit"
                    class="rounded-2xl bg-indigo-600 px-8 py-4 font-bold text-white shadow-lg shadow-indigo-100 transition hover:bg-indigo-700 active:scale-95">

                    Simpan Partner

                </button>

                <a
                    href="{{ route('admin.partners.index') }}"
                    class="rounded-2xl border border-slate-200 px-8 py-4 font-bold text-slate-600 transition hover:bg-slate-100">

                    Batal

                </a>

            </div>

        </form>

    </div>

</main>

@endsection