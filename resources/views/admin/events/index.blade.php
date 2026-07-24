@extends('layouts.admin')

@php
    use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
    <main class="flex-1 p-10 overflow-y-auto">
        <!-- HEADER -->
        <header class="flex items-center justify-between mb-10">
            <div>
                <h1 class="text-3xl font-black">
                    Manajemen Event
                </h1>

                <p class="text-slate-500 font-medium">
                    Kelola semua event yang tersedia di platform.
                </p>
            </div>

            <!-- BUTTON -->
            <a href="{{ route('admin.events.create') }}"
                class="inline-flex items-center gap-2 rounded-2xl bg-indigo-600 px-6 py-3 font-bold text-white shadow-lg shadow-indigo-100 transition hover:bg-indigo-700 active:scale-95">
                + Tambah Event
            </a>
        </header>

        <!-- ALERT -->
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-100 px-6 py-4 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <div class="overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left">
                    <!-- TABLE HEAD -->
                    <thead class="bg-slate-50 text-[10px] font-black uppercase tracking-widest text-slate-400">

                        <tr>

                            <th class="w-16 px-8 py-4">
                                No
                            </th>

                            <th class="px-8 py-4">
                                Poster
                            </th>

                            <th class="px-8 py-4">
                                Event
                            </th>

                            <th class="px-8 py-4">
                                Harga / Stok
                            </th>

                            <th class="px-8 py-4">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <!-- TABLE BODY -->
                    <tbody class="divide-y border-t">
                        @forelse ($events as $event)
                            <tr class="transition hover:bg-slate-50/50">
                                <!-- NUMBER -->
                                <td class="px-8 py-6 font-bold text-slate-400">
                                    {{ $loop->iteration }}
                                </td>

                                <!-- POSTER -->
                                <td class="px-8 py-6">
                                    <img src="{{ $event->poster_path && Storage::disk('public')->exists($event->poster_path)
                                        ? asset('storage/' . $event->poster_path)
                                        : 'https://placehold.co/16x20' }}"
                                        class="w-16 h-20 rounded-xl object-cover shadow-sm">
                                </td>

                                <!-- EVENT INFO -->
                                <td class="px-8 py-6">
                                    <h3 class="font-black text-slate-800">
                                        {{ $event->title }}
                                    </h3>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $event->category->name ?? '-' }}
                                        •
                                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }}
                                    </p>
                                </td>

                                <!-- PRICE -->
                                <td class="px-8 py-6">
                                    <p class="font-bold text-indigo-600">
                                        Rp {{ number_format($event->price, 0, ',', '.') }}
                                    </p>
                                    <p class="mt-1 text-xs text-slate-400">
                                        Stok : {{ $event->stock }}
                                    </p>
                                </td>

                                <!-- ACTION -->
                                <td class="px-8 py-6">
                                    <div class="flex gap-2">
                                        <!-- EDIT -->
                                        <a href="{{ route('admin.events.edit', $event->id) }}"
                                            class="rounded-xl bg-indigo-50 p-2.5 text-indigo-600 transition hover:bg-indigo-600 hover:text-white">

                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>

                                        <!-- DELETE -->
                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus event ini?')">

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded-xl bg-rose-50 p-2.5 text-rose-600 transition hover:bg-rose-600 hover:text-white">

                                                <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td colspan="5" class="px-8 py-12 text-center text-slate-500">
                                    Belum ada event yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-8 flex justify-center">
    {{ $events->links() }}
</div>
    </main>
@endsection
