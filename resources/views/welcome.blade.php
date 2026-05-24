@extends('layouts.app')

@section('content')

    <!-- HERO SECTION -->
    <section class="mx-auto flex max-w-7xl flex-col items-center gap-12 px-6 py-20 md:flex-row">

        <div class="flex-1 space-y-8">

            <span
                class="inline-block rounded-full bg-indigo-100 px-4 py-1.5 text-sm font-bold uppercase tracking-wider text-indigo-700">
                #1 Event Platform
            </span>

            <h1 class="text-5xl font-extrabold leading-tight md:text-7xl">
                Temukan & Pesan
                <span class="text-indigo-600">Tiket Event</span>
                Impianmu.
            </h1>

            <p class="max-w-lg text-lg leading-relaxed text-slate-500">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
                Pesan aman & cepat dengan Midtrans.
            </p>

            <div class="flex gap-4">

                <a
                    href="#events"
                    class="rounded-2xl bg-indigo-600 px-8 py-4 text-lg font-bold text-white shadow-xl shadow-indigo-200 transition-transform hover:scale-105">

                    Mulai Jelajah
                </a>

                <a
                    href="#"
                    class="rounded-2xl border-2 border-slate-200 px-8 py-4 text-lg font-bold transition hover:border-indigo-600 hover:text-indigo-600">

                    Cara Pesan
                </a>

            </div>

        </div>

        <!-- HERO IMAGE -->
        <div class="relative flex-1">

            <div
                class="animate-blob absolute -top-10 -left-10 h-64 w-64 rounded-full bg-indigo-400 opacity-20 blur-3xl mix-blend-multiply filter">
            </div>

            <div
                class="animate-blob animation-delay-2000 absolute -right-10 -bottom-10 h-64 w-64 rounded-full bg-purple-400 opacity-20 blur-3xl mix-blend-multiply filter">
            </div>

            <img
                src="{{ asset('assets/concert.png') }}"
                alt="Concert"
                class="relative z-10 aspect-[4/5] w-full rounded-[2rem] object-cover object-center shadow-2xl">

        </div>

    </section>

    <!-- EVENTS -->
    <section id="events" class="mx-auto max-w-7xl px-6 py-20">

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <div>

                <h2 class="mb-2 text-3xl font-extrabold">
                    Event Terdekat
                </h2>

                <p class="font-medium text-slate-500">
                    Jangan sampai ketinggalan acara seru minggu ini!
                </p>

            </div>

            <!-- FILTER CATEGORY -->
            <div class="flex flex-wrap gap-3">

                <a
                    href="/"
                    class="rounded-full bg-slate-200 px-5 py-2.5 text-sm font-semibold text-slate-700 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-indigo-600 hover:text-white hover:shadow-lg">

                    Semua Kategori
                </a>

                @foreach ($categories as $cat)

                    <a
                        href="/?category={{ $cat->slug }}"
                        class="rounded-full bg-indigo-100 px-5 py-2.5 text-sm font-semibold text-indigo-700 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-indigo-600 hover:text-white hover:shadow-lg">

                        {{ $cat->name }}

                    </a>

                @endforeach

            </div>

        </div>

        <!-- EVENT GRID -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            @forelse ($events as $event)

                <div
                    class="group overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm transition-all duration-300 hover:shadow-2xl">

                    <!-- IMAGE -->
                    <div class="relative aspect-[3/4] overflow-hidden">

                        @if ($event->poster_path)

                            <img
                                src="{{ asset('storage/events/' . $event->poster_path) }}"
                                alt="{{ $event->title }}"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">

                        @else

                            <img
                                src="https://placehold.co/600x800"
                                alt="No Image"
                                class="h-full w-full object-cover">

                        @endif

                        <!-- CATEGORY -->
                        <div
                            class="absolute top-4 left-4 rounded-lg bg-white/90 px-3 py-1 text-xs font-bold uppercase text-indigo-600 backdrop-blur">

                            {{ $event->category->name ?? 'Tanpa Kategori' }}

                        </div>

                    </div>

                    <!-- CONTENT -->
                    <div class="p-6">

                        <h3 class="mb-2 text-xl font-bold transition group-hover:text-indigo-600">
                            {{ $event->title }}
                        </h3>

                        <div class="mb-4 flex items-center gap-2 text-sm text-slate-500">

                            <span>
                                {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between border-t pt-4">

                            <span class="text-2xl font-black text-indigo-600">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>

                            <a
                                href="{{ route('events.show', $event->id) }}"
                                class="rounded-xl bg-indigo-50 px-5 py-2 font-bold text-indigo-600 transition hover:bg-indigo-600 hover:text-white">

                                Lihat Detail
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full rounded-3xl border border-dashed py-20 text-center text-slate-500">

                    Belum ada event tersedia.

                </div>

            @endforelse

        </div>

    </section>

    <!-- PARTNER -->
    <section class="bg-slate-50 py-20 border-t border-slate-100">

        <div class="mx-auto max-w-7xl px-6">

            <div class="mb-14 text-center">

                <h2 class="mb-3 text-3xl font-extrabold">
                    Partner Kami
                </h2>

                <p class="font-medium text-slate-500">
                    Didukung oleh berbagai partner terpercaya
                </p>

            </div>

            <div class="grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-5">

                @forelse ($partners as $partner)

                    <div
                        class="group rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl">

                        <div class="mb-4 flex h-24 items-center justify-center">

                            @if ($partner->logo_url)

                                <img
                                    src="{{ asset('storage/' . $partner->logo_url) }}"
                                    alt="{{ $partner->name }}"
                                    class="max-h-20 object-contain grayscale transition-all duration-300 group-hover:grayscale-0">

                            @else

                                <img
                                    src="https://placehold.co/200x100"
                                    alt="{{ $partner->name }}"
                                    class="max-h-20 object-contain">

                            @endif

                        </div>

                        <h3 class="text-center text-sm font-bold text-slate-700 transition group-hover:text-indigo-600">
                            {{ $partner->name }}
                        </h3>

                    </div>

                @empty

                    <div class="col-span-full rounded-3xl border border-dashed py-12 text-center text-slate-500">

                        Belum ada partner tersedia.

                    </div>

                @endforelse

            </div>

        </div>

    </section>

@endsection