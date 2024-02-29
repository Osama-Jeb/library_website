<div>
    <div class="p-5">
        <div class="text-center">
            <a wire:navigate href="{{ route('books.create') }}">
                <button class="btn btn-neutral">Add New Book</button>
            </a>
        </div>

        <p class="text-2xl">Manage Your Books: </p>
        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>
                                <button wire:click='setOrderTitle'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M5 12a1 1 0 102 0V6.414l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L5 6.414V12zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z">
                                        </path>
                                    </svg>
                                </button>
                                <label>
                                    <input wire:model.live='search' type="text" class="input"
                                        placeholder="Title" />
                                </label>
                                <button class="btn btn-accent btn-sm text-white"
                                    wire:click='resetFilters'>Reset</button>
                            </th>
                            <th>
                                Author
                            </th>
                            <th>Categories</th>
                            <th>Owned by</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->books() as $book)
                            <!-- row 1 -->
                            <tr>
                                {{-- <th>
                                    <label>
                                        <input type="checkbox" class="checkbox" />
                                    </label>
                                </th> --}}
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="avatar">
                                            <div class="mask mask-squircle w-12 h-12">
                                                <a href="{{ route('books.edit', $book->id) }}">
                                                    <img src="{{ $book->getCover() }}"
                                                        alt="Avatar Tailwind CSS Component" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="font-bold">{{ $book->title }}</div>
                                            <div class="text-sm opacity-50">
                                                {{ \Illuminate\Support\Str::limit($book->description, 25, $end = '...') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $book->author }}
                                    <br />
                                    <span class="badge badge-ghost badge-sm">{{ $book->release_date }}</span>
                                </td>
                                <td>
                                    <div class="flex flex-wrap gap-2 w-[75%]">

                                        @foreach ($book->categories as $category)
                                            <span class="badge badge-info">{{ $category->category }}</span>
                                        @endforeach
                                    </div>
                                </td>
                                <td>
                                    @foreach ($book->own as $owner)
                                        <button class="btn btn-ghost btn-xs">
                                            {{ $owner->name }}
                                        </button>
                                    @endforeach
                                </td>
                                <th>
                                    <a wire:navigate href="{{ route('books.edit', $book->id) }}">
                                        <button class="btn btn-accent text-white font-thin btn-xs">Details</button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div>
                    {{ $this->books()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
