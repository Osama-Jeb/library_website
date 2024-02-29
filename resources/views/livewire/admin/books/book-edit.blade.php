<div class="flex items-center justify-center h-[100vh] relative">

    <button type="submit" class="btn btn-error text-white btn-sm absolute top-[10vh] right-[10vw] z-10"
    wire:click='delete'
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                clip-rule="evenodd"></path>
        </svg>
    </button>
    <div>
        <form action="" wire:submit='update'>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    {{-- Title and Author --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="title">Title:<span class="text-red-600">*</span> </label>
                            <input type="text" wire:model='editTitle' class="input input-bordered w-full"
                                placeholder="Title" />
                            @error('editTitle')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="author">Author:<span class="text-red-600">*</span> </label>
                            <input type="text" wire:model='editAuthor' class="input input-bordered w-full"
                                placeholder="Author">
                            @error('editAuthor')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="flex flex-col mt-3">
                        <label for="description">Description:<span class="text-red-600">*</span> </label>
                        <textarea class="textarea textarea-bordered" placeholder="Description" wire:model='editDescription'></textarea>
                        @error('editDescription')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                    </div>

                    {{-- Pages and Amount --}}
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <div class="flex flex-col">
                            <label for="pages">Pages:<span class="text-red-600">*</span> </label>
                            <input type="number" wire:model='editPages' class="input input-bordered w-full"
                                placeholder="N° of Pages" />
                            @error('editPages')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="amount">Amount:<span class="text-red-600">*</span> </label>
                            <input type="number" wire:model='editAmount' class="input input-bordered w-full"
                                placeholder="Amount">
                            @error('editAmount')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>
                </div>


                <div>
                    {{-- Release Date --}}
                    <div class="flex flex-col">
                        <label for="release_date">Release Date:<span class="text-red-600">*</span> </label>
                        <input type="date" wire:model='editRelease' class="input input-bordered w-full">
                        @error('editRelease')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                    </div>

                    {{-- Cover --}}
                    <div class="flex flex-col mt-3">
                        <label for="cover">Cover:<span class="text-red-600">*</span> </label>
                        <input type="file" class="file-input file-input-bordered w-full" wire:model='editCover' />
                        @error('editCover')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                        <div wire:loading wire:target="editCover" class="text-green-500 font-bold text-xl">
                            Uploading...
                        </div>
                        @if ($editCover !== $book->cover)
                            <img width="200px" class="mt-3 rounded-xl" src="{{ $editCover->temporaryUrl() }}"
                                alt="">
                        @else
                            <img width="200px" class="mt-3 rounded-xl" src="{{ $book->getCover() }}" alt="">
                        @endif
                    </div>



                </div>

            </div>
            <div class="flex flex-col">
                <span>Categories: </span>
                <div class="flex justify-between">
                    @foreach ($this->categories() as $category)
                        <div>
                            <input class="checkbox" type="checkbox" value="{{ $category->id }}"
                                wire:model="editCategories">
                            <label for="category">{{ $category->category }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-accent text-white btn-block mt-8 max-w-xs">Update</button>
            </div>
        </form>
    </div>
</div>
