@extends('layouts.organizer')

@section('title','Analitik Pendapatan')

@section('content')

<div class="p-8">

<h1 class="text-3xl font-black">
Analitik Pendapatan
</h1>

<div class="grid grid-cols-2 gap-6 mt-8">

<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-slate-400">
Total Pendapatan
</p>

<h2 class="text-3xl font-black mt-3">
Rp {{ number_format($totalIncome,0,',','.') }}
</h2>

</div>


<div class="bg-white rounded-3xl p-6 shadow">

<p class="text-slate-400">
Total Transaksi
</p>

<h2 class="text-3xl font-black mt-3">
{{ $totalTransaction }}
</h2>

</div>


</div>

</div>

@endsection