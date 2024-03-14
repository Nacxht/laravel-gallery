<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- Vite --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>

<body class="">
    {{-- Navbar --}}
    @auth('web')
        <livewire:partials.user-navbar />
    @else
        <livewire:partials.guest-banner />
    @endauth

    {{-- Content --}}
    {{ $slot }}
</body>

</html>
