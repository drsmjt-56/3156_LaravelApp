@extends('layouts.app')

@section('title', $partner->name)

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">
    {{-- HEADER --}}
    <div class="rounded-3xl bg-gradient-to-r from-indigo-600 to-indigo-700 p-10 text-white shadow-xl">
        <div class="flex items-center gap-6">
            <div
                class="flex h-24 w-24 items-center justify-center rounded-full bg-white text-3xl font-black text-indigo-600">
                {{ strtoupper(substr($partner->name,0,2)) }}
            </div>

            <div>
                <h1 class="text-4xl font-black">
                    {{ $partner->name }}
                </h1>
                <p class="mt-2 text-indigo-100">
                    Penyelenggara Event Terverifikasi
                </p>
            </div>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="mt-8 grid gap-6 md:grid-cols-3">
        <div class="rounded-2xl bg-white p-6 shadow">
            <h3 class="text-gray-500">
                Total Event
            </h3>
            <p class="mt-2 text-4xl font-black text-indigo-600">
                {{ $partner->events->count() }}
            </p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow">
            <h3 class="text-gray-500">
                Total Review
            </h3>
            <p class="mt-2 text-4xl font-black text-indigo-600">
                {{ $reviews->count() }}
            </p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow">
            <h3 class="text-gray-500">
                Rating Rata-rata
            </h3>
            <p class="mt-2 text-4xl font-black text-yellow-500">
                {{ number_format($reviews->avg('rating') ?? 0,1) }}
                ⭐
            </p>
        </div>
    </div>

    {{-- EVENT --}}
    <div class="mt-12">
        <h2 class="mb-6 text-3xl font-black">
            Event yang Diselenggarakan
        </h2>
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @forelse($partner->events as $event)
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h3 class="text-xl font-bold">
                        {{ $event->title }}

                    </h3>
                    <p class="mt-2 text-gray-500">
                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y H:i') }}
                    </p>

                    <p class="mt-2 text-gray-500">
                        {{ $event->location }}
                    </p>

                    <a
                        href="{{ route('events.show',$event->id) }}"
                        class="mt-5 inline-block rounded-lg bg-indigo-600 px-5 py-2 text-white">
                        Lihat Event
                    </a>
                </div>

            @empty
                <div class="col-span-full rounded-xl bg-white p-8 text-center shadow">
                    Belum ada event.
                </div>
            @endforelse
        </div>
    </div>

    {{-- TESTIMONI --}}
    <div class="mt-16">
        <h2 class="mb-6 text-3xl font-black">
            Testimoni Pembeli
        </h2>
        @forelse($reviews as $review)
            <div class="mb-5 rounded-2xl bg-white p-6 shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold">
                            {{ $review->transaction->event->title }}
                        </h4>
                        <p class="text-sm text-gray-500">
                            {{ $review->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <div class="text-yellow-500 text-xl">
                        @for($i=1;$i<=5;$i++)
                            @if($i <= $review->rating)
                                ⭐
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>
                </div>
                <p class="mt-4 text-gray-700">
                    "{{ $review->review }}"
                </p>
            </div>
        @empty
            <div class="rounded-2xl bg-white p-10 text-center shadow">
                <h3 class="text-xl font-semibold">
                    Belum ada testimoni.
                </h3>
            </div>
        @endforelse
    </div>
</div>
@endsection