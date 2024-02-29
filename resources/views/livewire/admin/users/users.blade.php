<div class="p-5">

    <p class="text-2xl">Manage Your Books: </p>
    <div class="p-4">
        <div class="overflow-x-auto">
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
                                        placeholder="Name or Email" />
                                </label>
                                <button class="btn btn-accent btn-sm text-white"
                                    wire:click='resetFilters'>Reset</button>
                            </th>
                            <th>
                                Email
                            </th>
                            <th>Owned Books</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($this->users() as $user)
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
                                                <img src="{{ $user->profile_photo_url }}"
                                                    alt="Avatar Tailwind CSS Component" />
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $user->email }}
                                    <br />
                                </td>
                                <td>
                                    @foreach ($user->own as $book)
                                        {{ $book->title }}
                                    @endforeach
                                </td>
                                <th>
                                    <a href="{{route('users.edit', $user->id)}}">
                                        <button class="btn btn-ghost btn-xs">details</button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach

                    </tbody>

                </table>
            </div>
            {{ $this->users()->links() }}
        </div>
    </div>
</div>


</div>
