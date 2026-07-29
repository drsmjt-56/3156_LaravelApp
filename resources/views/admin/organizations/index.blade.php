@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Organizer</h2>

    <a href="{{ route('admin.organizations.create') }}"
        class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
        + Tambah Organizer
    </a>
</div>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-xl shadow overflow-hidden">
<table class="w-full">

<thead class="bg-slate-100">
<tr>
    <th class="p-3 text-left">Nama Organizer</th>
    <th class="p-3 text-left">Status</th>
    <th class="p-3 text-center">Jumlah Event</th>
    <th class="p-3 text-center">Pendapatan</th>
    <th class="p-3 text-center">Aksi</th>
</tr>
</thead>

<tbody>

@forelse($organizations as $organization)

<tr class="border-t">

<td class="p-3">
    {{ $organization->name }}
</td>

<td class="p-3">
    {{ ucfirst($organization->status) }}
</td>

<td class="p-3 text-center">
    {{ $organization->events->count() }}
</td>

<td class="p-3 text-center">
Rp
{{ number_format(
    $organization
    ->events
    ->flatMap->transactions
    ->whereIn('status',['success','settlement'])
    ->sum('total_price')

,0,',','.') }}

</td>

<td class="p-3 text-center">
@if($organization->status == 'pending')

<form
action="{{ route('admin.organizations.approve',$organization) }}"
method="POST"
class="inline">

    @csrf

    @method('PATCH')

    <button
    class="text-green-600 mr-3">

        Approve

    </button>

</form>

@endif


<a href="{{ route('admin.organizations.show',$organization) }}"
class="text-indigo-600 mr-3">

Lihat

</a>


<a href="{{ route('admin.organizations.edit',$organization) }}"
class="text-blue-600 mr-3">

Edit

</a>


<form
action="{{ route('admin.organizations.destroy',$organization) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')

<button class="text-red-600">

Hapus

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center p-5">
Belum ada organizer
</td>

</tr>

@endforelse

</tbody>

</table>
</div>

<div class="mt-5">
{{ $organizations->links() }}
</div>

@endsection