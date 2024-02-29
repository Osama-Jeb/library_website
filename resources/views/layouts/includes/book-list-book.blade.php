<div wire:key='BookCard-{{ $book->id }}'
    class="article-body grid grid-cols-12 gap-3 mt-5 items-start">
    <div class="article-thumbnail col-span-3 flex items-center">
        <a wire:navigate href="{{ route('book.show', $book->title) }}">
            <img class="mw-100 mx-auto rounded-xl" src="{{ $book->getCover() }}" alt="thumbnail">
        </a>
    </div>
    <div class="col-span-8">
        <h2 class="text-xl font-bold text-gray-900">
            <a href="">
                {{ strtoupper($book->title) }}
            </a>
        </h2>
        <div class="article-meta flex py-1 text-sm items-center">
            By: <span class="mr-1 text-xs font-bold">{{ $book->author }}</span>
        </div>

        <p class="mt-2 text-base text-gray-700 font-light">
            {{ $book->description }}
        </p>
        <div class="article-actions-bar mt-6 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <span class="text-sm font-bold">
                    Release Date:
                    <span class="text-gray-500">{{ $book->release_date }}</span>
                </span>

                @foreach ($book->categories as $category)
                    <button class="badge badge-ghost"
                        x-on:click="$dispatch('category', {'category' : {{ $category->id }} })">{{ $category->category }}</button>
                @endforeach
            </div>
            <div class="flex gap-2">
                <livewire:book.add-book wire:key='AddBtn-{{ $book->id }}' :$book />
            </div>
        </div>
    </div>
</div>
