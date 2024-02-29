<div id="recommended-topics-box" x-data>
    <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Categories</h3>
    <div class="topics flex flex-wrap justify-start gap-3">
        @foreach ($categories as $category)
            <button x-on:click="$dispatch('category', {'category' : {{ $category->id }} })"
                class="bg-red-600
                    text-white
                    rounded-xl px-3 py-1 text-base">
                {{ $category->category }}
            </button>
        @endforeach
    </div>
</div>
