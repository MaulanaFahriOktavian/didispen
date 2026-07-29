<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Siswa - DIDISPEN</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8">

    <h1 class="text-3xl font-bold text-center mb-2">
        DIDISPEN
    </h1>

    <p class="text-center text-gray-500 mb-8">
        Login Siswa
    </p>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('student.login.process') }}">

        @csrf

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                NIS
            </label>

            <input
                type="text"
                name="nis"
                value="{{ old('nis') }}"
                class="border rounded-lg w-full p-3">

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Tanggal Lahir
            </label>

            <input
                type="date"
                name="birth_date"
                class="border rounded-lg w-full p-3">

        </div>

        <button
            class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-3">

            Login

        </button>

    </form>

</div>

</body>
</html>