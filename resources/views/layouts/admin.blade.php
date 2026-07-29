<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

</head>


<body class="bg-slate-50 text-slate-900 flex min-h-screen">


<!-- SIDEBAR -->

<aside class="w-64 bg-indigo-900 text-indigo-100 flex flex-col p-6 space-y-8 sticky top-0 h-screen">


    <!-- LOGO -->

    <div class="flex items-center gap-3">

        <div
            class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
            AH
        </div>

        <span class="text-xl font-bold text-white">
            AmikomEventHub
        </span>

    </div>



    <!-- MENU -->

    <nav class="flex-1 space-y-2">


        <p class="text-[10px] font-bold uppercase tracking-widest text-indigo-400 mb-4 px-2">
            MAIN MENU
        </p>



        <!-- DASHBOARD -->

        <a href="{{ url('/admin/dashboard') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/dashboard') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>▦</span>

            Dashboard

        </a>




        <!-- ORGANIZATION -->

        <a href="{{ url('/admin/organizations') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/organizations*') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>▣</span>

            Kelola Organisasi

        </a>




        <!-- EVENT -->

        <a href="{{ url('/admin/events') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/events*') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>◫</span>

            Kelola Event

        </a>





        <!-- CATEGORY -->

        <a href="{{ url('/admin/categories') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/categories*') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>▥</span>

            Kelola Kategori

        </a>





        <!-- PARTNER -->

        <a href="{{ url('/admin/partners') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/partners*') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>♧</span>

            Kelola Partner

        </a>





        <!-- TRANSAKSI -->

        <a href="{{ url('/admin/transactions') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-bold transition
        {{ request()->is('admin/transactions*') 
        ? 'bg-indigo-800 text-white' 
        : 'hover:bg-indigo-800 text-indigo-100' }}">

            <span>▤</span>

            Laporan Transaksi

        </a>



    </nav>





    <!-- LOGOUT -->

    <div class="pt-6 border-t border-indigo-800">


        <form action="{{ route('admin.logout') }}" method="POST">

            @csrf


            <button type="submit"
            class="flex items-center gap-3 px-4 py-3 text-indigo-300 hover:text-white transition font-medium w-full">


                <span>
                    ⇥
                </span>


                Keluar


            </button>


        </form>


    </div>


</aside>





<!-- CONTENT -->

<main class="flex-1 p-10">


    @yield('content')


</main>



</body>

</html>