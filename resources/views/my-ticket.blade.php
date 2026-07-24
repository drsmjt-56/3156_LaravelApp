@extends('layouts.app')

@section('title', 'My Ticket')

@section('content')

    <div class="max-w-6xl mx-auto px-6 py-10">

        <h1 class="text-3xl font-bold mb-8">
            My Ticket
        </h1>

        @if (session('success'))
            <div class="mb-5 rounded-lg bg-green-100 p-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @forelse($transactions as $transaction)
            <div class="mb-6 rounded-xl border bg-white shadow">

                <div class="p-6">

                    <div class="flex justify-between items-start">

                        <div>

                            <h2 class="text-xl font-bold">
                                {{ $transaction->event->title }}
                            </h2>

                            <p class="text-gray-500 mt-2">
                                Order ID :
                                {{ $transaction->order_id }}
                            </p>

                            <p class="text-gray-500">
                                Status :
                                {{ ucfirst($transaction->status) }}
                            </p>

                            <p class="text-gray-500">
                                Tanggal Event :
                                {{ \Carbon\Carbon::parse($transaction->event->date)->format('d M Y H:i') }}
                            </p>

                        </div>

                    </div>

                    <hr class="my-5">

                    @php
                        $bolehReview = now()->gte(
                            Carbon\Carbon::parse($transaction->event->end_date ?? $transaction->event->date)
                                ->addDay()
                                ->startOfDay(),
                        );
                    @endphp


                    @if ($transaction->review)
                        <span class="inline-block rounded bg-green-100 px-4 py-2 text-green-700">
                            Anda sudah memberikan review.
                        </span>
                    @elseif($bolehReview)
                        <a href="{{ route('review.create', $transaction->id) }}"
                            class="rounded-lg bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-700">
                            Beri Review
                        </a>
                    @else
                        <span class="inline-block rounded bg-yellow-100 px-4 py-2 text-yellow-700">
                            Review tersedia H+1 setelah acara selesai.
                        </span>
                    @endif

                </div>

            </div>

        @empty

            <div class="rounded-xl bg-white p-10 text-center shadow">

                <h2 class="text-xl font-semibold">
                    Belum ada tiket.
                </h2>

                <p class="mt-3 text-gray-500">
                    Tiket yang sudah Anda beli akan muncul di sini.
                </p>

            </div>
        @endforelse

    </div>

@endsection
