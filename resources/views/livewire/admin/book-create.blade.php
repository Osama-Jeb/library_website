<div
class="flex items-center justify-center h-[100vh]">

    <div>
        <form action="" wire:submit='store'>

            <div class="grid grid-cols-2 gap-2">
                <div>
                    {{-- Title and Author --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col">
                            <label for="title">Title:<span class="text-red-600">*</span> </label>
                            <input type="text" wire:model='title' class="input input-bordered w-full"
                                placeholder="Title" />
                            @error('title')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="author">Author:<span class="text-red-600">*</span> </label>
                            <input type="text" wire:model='author' class="input input-bordered w-full"
                                placeholder="Author">
                            @error('author')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div class="flex flex-col mt-3">
                        <label for="description">Description:<span class="text-red-600">*</span> </label>
                        <textarea class="textarea textarea-bordered" placeholder="Description" wire:model='description'></textarea>
                        @error('description')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                    </div>

                    {{-- Pages and Amount --}}
                    <div class="grid grid-cols-2 gap-4 mt-3">
                        <div class="flex flex-col">
                            <label for="pages">Pages:<span class="text-red-600">*</span> </label>
                            <input type="number" wire:model='pages' class="input input-bordered w-full"
                                placeholder="N° of Pages" />
                            @error('pages')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label for="amount">Amount:<span class="text-red-600">*</span> </label>
                            <input type="number" wire:model='amount' class="input input-bordered w-full"
                                placeholder="Amount">
                            @error('amount')
                                <em class="text-red-600 font-bold">{{ $message }}</em>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class=" flex flex-col justify-between">
                    {{-- Release Date --}}
                    <div class="flex flex-col">
                        <label for="release_date">Release Date:<span class="text-red-600">*</span> </label>
                        <input type="date" wire:model='release_date' class="input input-bordered w-full">
                        @error('release_date')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="category">Category: </label>
                        <select wire:model='selectedCat' class="">
                            @foreach ($this->categories() as $category)
                                <option value="{{$category->id}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Cover --}}
                    <div class="flex flex-col">
                        <label for="cover">Cover:<span class="text-red-600">*</span> </label>
                        <input type="file" class="file-input file-input-bordered w-full" wire:model='cover' />
                        @error('cover')
                            <em class="text-red-600 font-bold">{{ $message }}</em>
                        @enderror
                        <div wire:loading wire:target="cover" class="text-green-500 font-bold text-xl">Uploading...</div>
                    </div>


                </div>
                @if ($cover)
                    <img width="200px" class="mt-3 rounded-xl" src="{{$cover->temporaryUrl()}}" alt="">
                @endif

            </div>




            <button type="submit" class="btn btn-accent text-white btn-block mt-8">Add Boook</button>
        </form>
    </div>
</div>
