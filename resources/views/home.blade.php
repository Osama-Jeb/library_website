<x-guest-layout>

    @include('layouts.includes.hero')

    <div class="mb-10 px-6">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-green-500 font-bold">Latest Books</h2>
            <div class="w-full">
                <div class="grid grid-cols-4 gap-10 w-full">
                    @foreach ($books as $book)
                        <div class="md:col-span-1 col-span-3">
                            <a wire:navigate href="{{ route('book.show', $book->title) }}">
                                <div>
                                    <img class="w-full rounded-xl" src="{{ $book->cover }}">
                                </div>
                            </a>
                            <div class="mt-3">
                                <div class="flex items-center mb-2">
                                    <div>

                                        @foreach ($book->categories as $category)
                                            <span
                                                class="badge badge-secondary
                                        text-white
                                        rounded-xl text-sm mr-3">
                                                {{ $category->category }}
                                            </span>
                                        @endforeach
                                    </div>
                                    <p class="text-gray-500 text-sm">
                                        {{ $book->release_date }}
                                    </p>
                                </div>
                                <span>Title:
                                    <span class="text-xl font-bold text-gray-900">
                                        {{ strtoupper($book->title) }}
                                    </span>
                                </span>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <a wire:navigate class="mt-10 block text-center text-lg text-green-500 font-semibold"
                href="http://127.0.0.1:8000/books">More
                Books</a>
        </div>
    </div>

</x-guest-layout>
