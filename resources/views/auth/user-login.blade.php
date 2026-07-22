<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User - AmikomEventHub</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-white to-purple-100 min-h-screen flex items-center justify-center">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-10">

        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-indigo-600">
                AmikomEventHub
            </h1>

            <p class="text-gray-500 mt-3">
                Login terlebih dahulu untuk memesan tiket event.
            </p>
        </div>

        <a href="{{ route('google.login') }}"
           class="flex items-center justify-center gap-3 w-full border border-gray-300 rounded-xl py-3 hover:bg-gray-100 transition duration-300">

            <img src="https://developers.google.com/identity/images/g-logo.png"
                 class="w-6 h-6">

            <span class="font-medium text-gray-700">
                Continue with Google
            </span>

        </a>

        <div class="mt-8 text-center text-sm text-gray-400">
            Dengan melanjutkan login, Anda menyetujui syarat dan ketentuan
            AmikomEventHub.
        </div>

    </div>

</body>
</html>