@extends ('layouts.app')
@section ('content')

    <!-- Hero Section -->
    <section class="mx-auto flex max-w-7xl flex-col items-center gap-12 px-6 py-20 md:flex-row">

        <div class="flex-1 space-y-8">

            <span
                class="inline-block rounded-full bg-indigo-100 px-4 py-1.5 text-sm font-bold tracking-wider text-indigo-700 uppercase">
                #1 Event Platform
            </span>

            <h1 class="text-5xl leading-tight font-extrabold md:text-7xl">
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

        <div class="relative flex-1">

            <div
                class="animate-blob absolute -top-10 -left-10 h-64 w-64 rounded-full bg-indigo-400 opacity-20 mix-blend-multiply blur-3xl filter">
            </div>

            <div
                class="animate-blob animation-delay-2000 absolute -right-10 -bottom-10 h-64 w-64 rounded-full bg-purple-400 opacity-20 mix-blend-multiply blur-3xl filter">
            </div>

            <img
                src="assets/concert.png"
                alt="Concert"
                class="relative z-10 aspect-[4/5] w-full rounded-[2rem] object-cover object-center shadow-2xl" />

            <div
                class="glass absolute -bottom-6 -left-6 z-20 rounded-2xl border border-white p-6 shadow-xl">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-green-100 text-green-600">

                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7">
                            </path>
                        </svg>

                    </div>

                    <div>

                        <p class="text-xs font-bold text-slate-500 uppercase">
                            Terverifikasi
                        </p>

                        <p class="font-bold">
                            Pembayaran Aman via Midtrans
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Grid -->
    <section id="events" class="mx-auto max-w-7xl px-6 py-20">

        <div class="mb-12 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

            <!-- Judul -->
            <div>

                <h2 class="mb-2 text-3xl font-extrabold">
                    Event Terdekat
                </h2>

                <p class="font-medium text-slate-500">
                    Jangan sampai ketinggalan acara seru minggu ini!
                </p>

            </div>

            <!-- Filter Kategori -->
            <div class="flex flex-wrap gap-3">

                <!-- Semua Kategori -->
                <a
                    href="/"
                    class="rounded-full bg-gray-200 px-5 py-2.5 text-sm font-semibold text-black shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-indigo-600 hover:text-white hover:shadow-lg">

                    Semua Kategori
                </a>

                <!-- Kategori Dinamis -->
                @foreach ($categories as $cat)

                    <a
                        href="/?category={{ $cat->slug }}"
                        class="rounded-full bg-indigo-100 px-5 py-2.5 text-sm font-semibold text-indigo-700 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:bg-indigo-600 hover:text-white hover:shadow-lg">

                        {{ $cat->name }}
                    </a>

                @endforeach

            </div>
        </div>

        <!-- Card Event -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($events as $event)

                <div
                    class="group borderslate-100 overflow-hidden rounded-3xl border bg-white shadow-sm transition-all duration-300 hover:shadow-2xl">

                    <div class="relative aspect-[3/4] overflow-hidden">

                        <img
                            src="https://placehold.co/200x600"
                            alt="{{ $event->title }}"
                            class="grouphover:scale-110 h-full w-full object-cover transition-transform duration-500" />

                        <div
                            class="bgwhite/90 absolute top-4 left-4 rounded-lg px-3 py-1 text-xs font-bold text-indigo-600 uppercase backdrop-blur">

                            {{ $event->category->name }}

                        </div>
                    </div>

                    <div class="p-6">

                        <h3 class="grouphover:text-indigo-600 mb-2 text-xl font-bold transition">
                            {{ $event->title }}
                        </h3>

                        <div class="text-slate500 mb-4 flex items-center gap-2 text-sm">

                            <svg
                                class="h-4 w-4"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    strokelinejoin="round"
                                    stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>

                            </svg>

                            <span>
                                {{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}
                            </span>

                        </div>

                        <div class="flex items-center justify-between border-t pt-4">

                            <span class="textindigo-600 text-2xl font-black">
                                Rp {{ number_format($event->price, 0, ',', '.') }}
                            </span>

                            <a
                                href="{{ url('event/1') }}"
                                class="textindigo-600 rounded-xl bg-indigo-50 px-5 py-2 font-bold transition hover:bg-indigo-600 hover:text-white">

                                Lihat Detail
                            </a>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </section>

@endsection