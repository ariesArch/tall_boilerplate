<!DOCTYPE html>

@if (\Request::is('rtl'))
<html lang="ar" dir="rtl">
@else
<html lang="en">
@endif

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png" />
    <title>ArtScape Gallary Management System</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <!-- Popper -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script> -->
    <!-- AlpineJS -->
    <!-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js"></script> -->
    <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.2/dist/cdn.min.js"></script> -->
    <!-- Main Styling -->
    <link href="{{ asset('assets') }}/css/main.css?v=1.0.3" rel="stylesheet" />
    @vite('resources/css/app.css')
    @livewireStyles
    @stack('scripts')
</head>

<body class="m-0 font-sans antialiased font-normal text-size-base leading-default bg-slate-200 text-slate-500">
    {{ $slot }}

    @livewireScripts
</body>

</html>