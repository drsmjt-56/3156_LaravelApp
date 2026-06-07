<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-3xl shadow-lg p-8">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-indigo-600">
                AmikomEventHub
            </h1>

            <p class="text-slate-500 mt-2">
                Silakan login untuk melanjutkan
            </p>
        </div>

        <form action="#" method="POST">

            @csrf

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 border border-red-400 text-red-700 px-4 py-3">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="mb-5">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Email
                </label>

                <input type="email" name="email" placeholder="Masukkan email"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-slate-700 mb-2">
                    Password
                </label>

                <input type="password" name="password" placeholder="Masukkan password"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 text-white py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                Login
            </button>
        </form>
    </div>
</body>

</html>
