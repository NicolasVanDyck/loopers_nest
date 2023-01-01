<x-loopers-layout>
    <x-slot name="description">Home</x-slot>
    <x-slot name="title">Looper's Nest</x-slot>

    <p>Looper's Nest. The only streaming service that matters.</p>

    @push('script')
        <script>
            console.log('The Vinyl Shop JavaScript works! 🙂')
        </script>
    @endpush

</x-loopers-layout>
