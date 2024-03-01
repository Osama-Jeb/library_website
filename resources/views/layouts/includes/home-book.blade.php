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
