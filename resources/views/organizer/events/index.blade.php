@extends('layouts.organizer')

@section('title', 'Kelola Event')
@section('page_title', 'Kelola Event')

@section('content')

<div class="flex-1 p-10">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold">
                Kelola Event
            </h1>

            <p class="text-slate-500 mt-1">
                Daftar event milik organisasi Anda
            </p>
        </div>

        <a href="{{ route('organizer.events.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl font-semibold">

            + Tambah Event

        </a>

    </div>


    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

            {{ session('success') }}

        </div>

    @endif



    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>

                    <th class="px-6 py-4 text-left">
                        Poster
                    </th>

                    <th class="px-6 py-4 text-left">
                        Event
                    </th>

                    <th class="px-6 py-4 text-left">
                        Tanggal
                    </th>

                    <th class="px-6 py-4 text-left">
                        Lokasi
                    </th>

                    <th class="px-6 py-4 text-left">
                        Harga
                    </th>

                    <th class="px-6 py-4 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($events as $event)

                <tr class="border-t">

                    <td class="px-6 py-4">

                        @if($event->poster_path)

                            <img src="{{ asset('storage/'.$event->poster_path) }}"
                                class="w-20 rounded-lg">

                        @else

                            -

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <h4 class="font-bold">

                            {{ $event->title }}

                        </h4>

                        <p class="text-sm text-slate-500">

                            {{ $event->category->name }}

                        </p>

                    </td>

                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $event->location }}

                    </td>

                    <td class="px-6 py-4">

                        Rp {{ number_format($event->price,0,',','.') }}

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('organizer.events.edit',$event->id) }}"
                                class="bg-yellow-400 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form action="{{ route('organizer.events.destroy',$event->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin hapus event?')"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-8 text-slate-500">

                        Belum ada event.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-6">

        {{ $events->links() }}

    </div>

</div>

@endsection