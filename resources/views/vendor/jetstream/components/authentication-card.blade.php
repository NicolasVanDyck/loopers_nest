<div class="min-h-screen flex flex-col  items-center pt-6 sm:pt-0 bg-black">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-black shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
