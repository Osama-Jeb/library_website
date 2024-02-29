<div id="posts" class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-300">
        <div>
            <button wire:click='resetFilters' class="btn btn-neutral btn-sm">
                Reset Filters
            </button>
        </div>
        <div id="filter-selector" class="flex items-center space-x-4 font-light ">

            <button class="{{ $order === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4"
                wire:click="setOrder('desc')"> Latest</button>
            <button class="{{ $order === 'asc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }} py-4 "
                wire:click="setOrder('asc')"> Oldest</button>
        </div>
    </div>
    <div class="py-4">
        <article class="[&:not(:last-child)]:border-b border-gray-300 pb-10">
            @foreach ($this->books as $book)
                @include('layouts.includes.book-list-book', ['book' => $book])
            @endforeach
        </article>
        <div>
            {{ $this->books->onEachSide(1)->links() }}
        </div>
    </div>
</div>
