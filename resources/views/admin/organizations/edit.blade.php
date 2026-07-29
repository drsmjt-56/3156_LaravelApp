@extends('layouts.admin')

@section('content')

<div class="p-6">

<h2 class="text-2xl font-bold mb-5">
Edit Organization
</h2>


<form 
action="{{ route('admin.organizations.update',$organization) }}"
method="POST">

@csrf
@method('PUT')


<div class="mb-4">

<label>
Nama Organization
</label>

<input 
type="text"
name="name"
value="{{ $organization->name }}"
class="border p-2 w-full">

</div>



<div class="mb-4">

<label>
Deskripsi
</label>


<textarea
name="description"
class="border p-2 w-full">{{ $organization->description }}</textarea>


</div>



<div class="mb-4">

<label>
Status
</label>


<select name="status"
class="border p-2 w-full">


<option value="pending"
@if($organization->status=='pending')
selected
@endif>

Pending

</option>


<option value="active"
@if($organization->status=='active')
selected
@endif>

Active

</option>


</select>


</div>


<button
class="bg-green-600 text-white px-4 py-2 rounded">

Update

</button>


</form>

</div>


@endsection