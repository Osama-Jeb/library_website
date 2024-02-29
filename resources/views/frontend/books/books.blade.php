<x-guest-layout>

    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <livewire:book.book-list />
        </div>
        <div id="side-bar"
            class="border-t
                    border-t-gray-300
                    md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-300 rounded-xl h-screen sticky top-0">

            @include('frontend.books.includes.search')

            @include('frontend.books.includes.category')
        </div>
    </div>
</x-guest-layout>
