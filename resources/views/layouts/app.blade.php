<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub - Temukan Event Seru!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <!-- Navigation -->
<nav class="glass sticky top-8 z-40 mx-4 mt-4 rounded-2xl border border-white/20 shadow-lg">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-2">

            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-600 text-xl font-bold text-white">
                AH
            </div>

            <span class="text-xl font-bold tracking-tight">
                AmikomEventHub
            </span>

        </a>

        <!-- Menu -->
        <div class="hidden items-center gap-8 font-medium md:flex">

            <a href="{{ route('home') }}"
                class="transition hover:text-indigo-600">
                Home
            </a>

            <a href="#event"
                class="transition hover:text-indigo-600">
                Event
            </a>

            <a href="#partner"
                class="transition hover:text-indigo-600">
                Penyelenggara
            </a>

        </div>

        <!-- Right Menu -->
<div class="flex items-center gap-3">

    @auth

        <span class="hidden md:block text-sm text-slate-500">
            Halo,
            <span class="font-semibold">
                {{ Auth::user()->name }}
            </span>
        </span>

        <a href="{{ route('ticket') }}"
            class="rounded-xl px-4 py-2 font-semibold hover:bg-slate-100 transition">
            My Ticket
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="rounded-xl bg-red-500 px-5 py-2 text-white hover:bg-red-600 transition">
                Logout
            </button>
        </form>

    @else

        <a href="{{ route('user.login') }}"
    class="rounded-xl bg-indigo-600 px-5 py-2 text-white hover:bg-indigo-700 transition">
    Login
</a>

    @endauth

</div>

    </div>

</nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-indigo-900 text-indigo-100 py-20 px-6 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4 col-span-2">
                <div class="flex items-center gap-2">
                    <div
                        class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH</div>
                    <span class="text-2xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="max-w-xs text-indigo-300">Platform reservasi tiket event online terbaik untuk mahasiswa dan
                    penyelenggara profesional.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a href="#" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">Semua Event</a></li>
                    <li><a href="#" class="hover:text-white transition">Cara Bayar</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
                <ul class="space-y-4">
                    <li>support@eventtiket.com</li>
                    <li>+62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-indigo-800 text-center text-indigo-400 text-sm">
            &copy; 2024 AmikomEventHub. Built with Laravel & Tailwind CSS.
        </div>
    </footer>

</body>

</html>