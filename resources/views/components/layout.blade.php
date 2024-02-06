<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL!</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="mx-auto mt-11 max-w-2xl bg-gradient-to-r from-indigo-200 via-purple-200 to-pink-200 text-slate-700">
    {{ $slot }}
</body>

</html>
