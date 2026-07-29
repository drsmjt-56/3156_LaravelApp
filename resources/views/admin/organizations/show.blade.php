@extends('layouts.admin')

@section('content')

<div class="p-6">

    <h1 class="text-3xl font-bold">
        {{ $organization->name }}
    </h1>

    <p class="text-gray-500 mt-2">
        {{ $organization->description }}
    </p>

    <p class="mt-2">
        Status :
        <span class="font-semibold">
            {{ ucfirst($organization->status) }}
        </span>
    </p>

    <hr class="my-6">

    {{-- Ringkasan --}}
    <div class="grid grid-cols-3 gap-5 mb-8">

        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-gray-500">Jumlah Event</p>

            <h2 class="text-3xl font-bold">
                {{ $organization->events->count() }}
            </h2>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-gray-500">Total Transaksi</p>

            <h2 class="text-3xl font-bold">
                {{ $organization->events->flatMap->transactions->count() }}
            </h2>
        </div>

        <div class="bg-white shadow rounded-xl p-5">
            <p class="text-gray-500">Pendapatan</p>

            <h2 class="text-3xl font-bold">

                Rp
                {{
                    number_format(
                        $organization->events
                            ->flatMap->transactions
                            ->whereIn('status',['success','settlement'])
                            ->sum('total_price'),
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>
        </div>

    </div>

    {{-- Daftar Event --}}
    <h2 class="text-xl font-bold mb-4">
        Daftar Event
    </h2>

    <table class="w-full border">

        <thead class="bg-gray-100">

        <tr>

            <th class="p-3 text-left">Judul Event</th>
            <th class="p-3 text-center">Tanggal</th>
            <th class="p-3 text-center">Harga</th>
            <th class="p-3 text-center">Transaksi</th>
            <th class="p-3 text-center">Pendapatan</th>

        </tr>

        </thead>

        <tbody>

        @forelse($organization->events as $event)

        <tr class="border-t">

            <td class="p-3">
                {{ $event->title }}
            </td>

            <td class="p-3 text-center">
                {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
            </td>

            <td class="p-3 text-center">
                Rp {{ number_format($event->price,0,',','.') }}
            </td>

            <td class="p-3 text-center">
                {{ $event->transactions->count() }}
            </td>

            <td class="p-3 text-center">

                Rp
                {{
                    number_format(
                        $event->transactions
                            ->whereIn('status',['success','settlement'])
                            ->sum('total_price'),
                        0,
                        ',',
                        '.'
                    )
                }}

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="5" class="text-center p-5">
                Belum ada event
            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection