<div>
    <div>
        <div>
            <a wire:navigate href="{{route('books.create')}}">
                <button class="btn btn-neutral">Add New Book</button>
            </a>
        </div>

        <p>Manage Your Books: </p>
        <div class="p-4">
            <div class="overflow-x-auto">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            {{-- <th>
                                <label>
                                    <input type="checkbox" class="checkbox" />
                                </label>
                            </th> --}}
                            <th>
                                <button wire:click='setOrderTitle'>Title</button>
                            </th>
                            <th>Author</th>
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
                                                <img src="{{$book->getCover()}}"
                                                    alt="Avatar Tailwind CSS Component" />
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="font-bold">{{$book->title}}</div>
                                            <div class="text-sm opacity-50">{{ \Illuminate\Support\Str::limit($book->description, 25, $end = '...') }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$book->author}}
                                    <br />
                                    <span class="badge badge-ghost badge-sm">{{$book->release_date}}</span>
                                </td>
                                <td>
                                    @foreach ($book->own as $owner)
                                        <button class="btn btn-ghost btn-xs">
                                            {{$owner->name}}
                                        </button>
                                    @endforeach
                                </td>
                                <th>
                                    <a wire:navigate href="{{route('books.edit', $book->title)}}">
                                        <button class="btn btn-ghost btn-xs">details</button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div>
                    {{$this->books()->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
