<div x-data>
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <figure>
            <img class="w-[250px] h-[250px] object-cover" src="{{ $book->getCover() }}" alt="Album" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">Title: {{ strtoupper($book->title) }}</h2>
            <p>By: <span class="badge badge-ghost">{{ $book->author }}</span></p>
            <p class="">{{ \Illuminate\Support\Str::limit($book->description, 35, $end = '...') }}</p>
            <div class="card-actions justify-end ">
                <button class="btn btn-accent text-white">Read Now!!</button>
                <button class="btn btn-error text-white"
                    x-on:click="$dispatch('remove-collection', {'id' : {{ $book->id }} })">Return Book</button>
            </div>
        </div>
    </div>
</div>
