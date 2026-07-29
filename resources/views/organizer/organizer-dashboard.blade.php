@extends('layouts.organizer')

@section('title','Organizer Dashboard')

@section('content')

<div class="min-h-screen bg-slate-50 p-8">


    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-3xl font-black text-slate-800">
            Dashboard Organizer
        </h1>

        <p class="mt-2 text-slate-500">
            Selamat datang kembali,
            <span class="font-bold text-indigo-600">
                {{ Auth::user()->name }}
            </span>
        </p>

        <div class="mt-2 inline-flex items-center gap-2 
                    bg-indigo-50 text-indigo-700 
                    px-4 py-2 rounded-xl text-sm font-bold">

            <i class="fas fa-building"></i>

            {{ $organization->name }}

        </div>

    </div>




    {{-- STAT CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">


        {{-- EVENT --}}
        <div class="bg-white rounded-3xl shadow-sm 
                    border border-slate-100 p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-sm text-slate-400 font-bold uppercase">
                        Total Event
                    </p>

                    <h2 class="text-4xl font-black text-slate-800 mt-3">
                        {{ $totalEvent }}
                    </h2>

                </div>


                <div class="w-14 h-14 rounded-2xl 
                            bg-indigo-100 
                            flex items-center justify-center">

                    <i class="fas fa-calendar-alt 
                              text-indigo-600 text-2xl"></i>

                </div>

            </div>

        </div>



        {{-- TICKET --}}
        <div class="bg-white rounded-3xl shadow-sm 
                    border border-slate-100 p-6">


            <div class="flex justify-between items-center">


                <div>

                    <p class="text-sm text-slate-400 font-bold uppercase">
                        Tiket Terjual
                    </p>


                    <h2 class="text-4xl font-black text-slate-800 mt-3">
                        {{ $totalTicket }}
                    </h2>


                </div>


                <div class="w-14 h-14 rounded-2xl 
                            bg-emerald-100
                            flex items-center justify-center">


                    <i class="fas fa-ticket-alt 
                              text-emerald-600 text-2xl"></i>


                </div>


            </div>


        </div>




        {{-- INCOME --}}
        <div class="bg-white rounded-3xl shadow-sm 
                    border border-slate-100 p-6">


            <div class="flex justify-between items-center">


                <div>


                    <p class="text-sm text-slate-400 font-bold uppercase">
                        Pendapatan
                    </p>


                    <h2 class="text-2xl font-black 
                               text-slate-800 mt-4">

                        Rp {{ number_format($totalIncome,0,',','.') }}

                    </h2>


                </div>



                <div class="w-14 h-14 rounded-2xl 
                            bg-yellow-100
                            flex items-center justify-center">


                    <i class="fas fa-wallet 
                              text-yellow-600 text-2xl"></i>


                </div>



            </div>


        </div>


    </div>





    {{-- EVENT LIST --}}

    <div class="bg-white rounded-3xl 
                shadow-sm border border-slate-100 overflow-hidden">


        {{-- HEADER TABLE --}}
        <div class="p-6 border-b border-slate-100">


            <h2 class="text-xl font-black text-slate-800">

                Event Milik {{ $organization->name }}

            </h2>


            <p class="text-sm text-slate-400 mt-1">

                Kelola seluruh acara yang berada dalam organisasi kamu

            </p>


        </div>





        <div class="overflow-x-auto">


            <table class="w-full">


                <thead class="bg-slate-50">


                    <tr class="text-xs uppercase 
                               tracking-wider 
                               text-slate-400">


                        <th class="px-6 py-4 text-left">
                            No
                        </th>


                        <th class="px-6 py-4 text-left">
                            Event
                        </th>


                        <th class="px-6 py-4">
                            Tanggal
                        </th>


                        <th class="px-6 py-4">
                            Harga
                        </th>


                        <th class="px-6 py-4">
                            Stok
                        </th>


                    </tr>


                </thead>



                <tbody>


                @forelse($events as $event)


                    <tr class="border-t hover:bg-slate-50 transition">


                        <td class="px-6 py-5 font-bold">
                            {{ $loop->iteration }}
                        </td>



                        <td class="px-6 py-5">

                            <p class="font-bold text-slate-800">
                                {{ $event->title }}
                            </p>


                            <p class="text-xs text-slate-400">
                                {{ $event->location }}
                            </p>

                        </td>



                        <td class="px-6 py-5 text-slate-600">

                            {{ \Carbon\Carbon::parse($event->date)
                            ->format('d M Y') }}

                        </td>



                        <td class="px-6 py-5 font-bold text-indigo-600">

                            Rp {{ number_format($event->price,0,',','.') }}

                        </td>



                        <td class="px-6 py-5">


                            <span class="px-4 py-2 rounded-full
                                         bg-blue-100 
                                         text-blue-700
                                         text-sm font-bold">

                                {{ $event->stock }}

                            </span>


                        </td>



                    </tr>



                @empty


                    <tr>

                        <td colspan="5"
                            class="text-center py-10 text-slate-400">

                            Belum ada event

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection