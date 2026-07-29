<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Organizer Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>
body{
    font-family:'Plus Jakarta Sans',sans-serif;
}
</style>

</head>


<body class="bg-slate-50 flex min-h-screen text-slate-900">


<!-- SIDEBAR ORGANIZER -->

<aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 h-screen sticky top-0">


<div class="flex items-center gap-3 mb-8">

<div class="w-10 h-10 bg-white rounded-xl 
flex items-center justify-center 
text-indigo-900 font-bold">

AH

</div>


<span class="text-xl font-bold text-white">
AmikomEventHub
</span>


</div>



<nav class="space-y-2">


<p class="text-xs uppercase 
text-indigo-400 font-bold mb-4">

Organizer Menu

</p>



<a href="{{ route('organizer.dashboard') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition

{{ request()->is('organizer/dashboard')
? 'bg-indigo-800 text-white'
: 'hover:bg-indigo-800' }}">


Dashboard Saya

</a>




<a href="{{ route('organizer.events.index') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition

{{ request()->is('organizer/events*')
? 'bg-indigo-800 text-white'
: 'hover:bg-indigo-800' }}">


Kelola Event Saya

</a>



<a href="{{ route('organizer.analytics') }}"
class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition

{{ request()->routeIs('organizer.analytics')
? 'bg-indigo-800 text-white'
: 'hover:bg-indigo-800' }}">


Analitik Pendapatan

</a>



</nav>




<div class="mt-auto border-t border-indigo-800 pt-5">


<form action="{{ route('logout') }}" method="POST">

@csrf


<button
class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white">

⇥

Keluar

</button>


</form>


</div>


</aside>



<!-- CONTENT -->

<main class="flex-1">

@yield('content')

</main>



</body>

</html>