<x-guest-layout>

    @include('layouts.includes.hero')

    <div class="mb-10 px-6">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-green-500 font-bold">Latest Books</h2>
            <div class="w-full">
                <div class="grid grid-cols-4 gap-10 w-full">
                    @foreach ($latestBooks as $book)
                        @include('layouts.includes.home-book')
                    @endforeach
                </div>
            </div>
            <a wire:navigate class="mt-10 block text-center text-lg text-green-500 font-semibold"
                href="http://127.0.0.1:8000/books">More
                Books</a>
        </div>
    </div>

    <div class="mb-10 px-6">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-green-500 font-bold">Niche Books</h2>
            <div class="w-full">
                <div class="grid grid-cols-4 gap-10 w-full">

                    @foreach ($randomBooks as $book)
                        @include('layouts.includes.home-book')
                    @endforeach
                </div>
            </div>
            <a wire:navigate class="mt-10 block text-center text-lg text-green-500 font-semibold"
                href="http://127.0.0.1:8000/books">More
                Books</a>
        </div>
    </div>

</x-guest-layout>
