<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'Welcome to the Vinyl Shop' }}">
    <x-layout.favicons/>
    <title>Looper's Nest: {{ $title ?? '' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-body antialiased">
<div class="flex flex-col space-y-4 min-h-screen text-white bg-black">
    <header class="shadow bg-black/70 sticky inset-0 backdrop-blur-sm z-10 border-b-4 border-b-gray-600">
        {{--  Navigation  --}}
        <x-layout.nav/>
    </header>
    <main class="container mx-auto p-4 flex-1 px-4">
        {{-- Title --}}
        <h1 class="text-5xl mb-4 text-red-500 justify-center flex">
            {{ $title ?? 'Title here...' }}
        </h1>
        {{-- Main content --}}
        {{ $slot }}
    </main>
    <x-layout.footer/>
</div>
@stack('script')
@livewireScripts
</body>
</html>

