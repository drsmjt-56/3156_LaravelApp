@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('title', $event->title)

@section('content')

<main class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-12">

    {{-- LEFT --}}
    <div class="lg:col-span-1">

        <div class="sticky top-32">

            <img
                src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path))
                    ? asset('storage/'.$event->poster_path)
                    : 'https://placehold.co/500x700' }}"
                alt="{{ $event->title }}"
                class="w-full rounded-[2.5rem] border-8 border-white object-cover aspect-[3/4] shadow-2xl">

            @if($event->organization)

                <a
                    href="{{ route('organizations.show', $event->organization->id) }}"
                    class="mt-8 block rounded-3xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">

                    <h4 class="mb-4 font-bold">
                        Penyelenggara
                    </h4>

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-600">
                            {{ strtoupper(substr($event->organization->name,0,2)) }}
                        </div>

                        <div>

                            <p class="font-bold text-slate-800">
                                {{ $event->organization->name }}
                            </p>

                            <p class="text-xs text-slate-500">
                                Lihat Profil Penyelenggara →
                            </p>

                        </div>

                    </div>

                </a>

            @else

                <div class="mt-8 rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">

                    <h4 class="mb-3 font-bold">
                        Penyelenggara
                    </h4>

                    <p class="text-slate-500">
                        Penyelenggara belum ditentukan.
                    </p>

                </div>

            @endif

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="lg:col-span-2 space-y-12">

        <div class="space-y-4">

            <span class="rounded-full bg-indigo-100 px-4 py-1.5 text-sm font-bold uppercase tracking-wider text-indigo-700">
                {{ $event->category->name ?? 'Tanpa Kategori' }}
            </span>

            <h1 class="text-4xl md:text-5xl font-black leading-tight">
                {{ $event->title }}
            </h1>

            <div class="flex flex-wrap gap-6 text-slate-500 font-medium">

                <div class="flex items-center gap-2">

                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>

                    <span>
                        {{ \Carbon\Carbon::parse($event->date)->format('d F Y H:i') }}
                    </span>

                </div>

                <div class="flex items-center gap-2">

                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>

                    <span>{{ $event->location }}</span>

                </div>

            </div>

        </div>

        <div>

            <h3 class="mb-4 text-2xl font-bold">
                Deskripsi Event
            </h3>

            <p class="text-lg leading-relaxed text-slate-600">
                {{ $event->description }}
            </p>

        </div>

        <div class="relative overflow-hidden rounded-[2.5rem] bg-indigo-600 p-8 text-white shadow-2xl shadow-indigo-200 md:p-12">

            <div class="relative z-10 flex flex-col items-center justify-between gap-8 md:flex-row">

                <div>

                    <p class="mb-2 text-sm font-bold uppercase tracking-widest text-indigo-200">
                        Harga Tiket
                    </p>

                    <h2 class="text-5xl font-black">
                        Rp {{ number_format($event->price,0,',','.') }}

                        <span class="text-lg font-medium text-indigo-200">
                            / orang
                        </span>
                    </h2>

                    <p class="mt-4 text-indigo-100">
                        Sisa stok :
                        <span class="font-bold">
                            {{ $event->stock }}
                        </span>
                        tiket
                    </p>

                </div>

                <a
                    href="{{ route('checkout.create',$event->id) }}"
                    class="rounded-2xl bg-white px-10 py-5 text-xl font-black text-indigo-600 transition hover:scale-105">

                    Pesan Sekarang

                </a>

            </div>

            <div class="absolute -bottom-20 -right-20 h-64 w-64 rounded-full bg-white opacity-10"></div>
            <div class="absolute -left-10 -top-10 h-32 w-32 rounded-full bg-indigo-400 opacity-20"></div>

        </div>

        <div>

            <h3 class="mb-4 text-xl font-bold">
                Kebijakan Tiket
            </h3>

            <ul class="space-y-3 text-slate-600">

                <li>✔ E-ticket dikirim otomatis setelah pembayaran berhasil.</li>
                <li>✔ Tiket dapat digunakan saat check-in acara.</li>
                <li class="text-rose-500">
                    ✘ Tiket yang sudah dibeli tidak dapat direfund.
                </li>

            </ul>

        </div>

    </div>

</main>

@endsection