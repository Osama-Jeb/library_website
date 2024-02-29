<article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
    <img class="w-full my-2 rounded-lg" src="{{ $book->cover }}" alt="">
    <h1 class="text-4xl font-bold text-left text-gray-800">
        {{ $book->title }}
    </h1>
    <div class="mt-2 flex justify-between items-center">
        <div class="flex py-5 text-base items-center">
            <p>By:<span class="mr-1 text-xs font-bold"> {{ $book->author }}</span></p>
        </div>
        <div class="flex items-center">
            <span class="text-gray-500 mr-2">{{ $book->release_date }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                stroke="currentColor" class="w-5 h-5 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
    </div>

    <div
        class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-b border-gray-100 py-4 px-2">
        <div class="flex items-center">
            <a class="flex items-center">
                <livewire:book.add-book wire:key='AddBtn-{{ $book->id }}' :$book />
                <span class="text-gray-600 ml-2">
                    {{ $book->amount }} left
                </span>
            </a>
        </div>
        <div>
            <div class="flex items-center">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 text-gray-500 hover:text-gray-800">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <div class="article-content py-3 text-gray-800 text-lg text-justify">
        <p class="text-3xl font-bold">Description: </p>
        <p>
            {{ $book->description }}
        </p>
    </div>

    <div class="flex items-center space-x-4 mt-10">
        @foreach ($book->categories as $category)
            <a href="#" class="badge badge-ghost text-black font-bold rounded-xl px-3 py-1 text-base">
                {{ $category->category }}
            </a>
        @endforeach
    </div>

    <div class="mt-10 comments-box border-t border-gray-100 pt-10">
        @auth

            <h2 class="text-2xl font-semibold text-gray-900 mb-5">Discussions</h2>
            <textarea wire:model='comment'
                class="w-full rounded-lg p-4 bg-gray-50 focus:outline-none text-sm text-gray-700 border-gray-200 placeholder:text-gray-400"
                cols="30" rows="7"></textarea>
            <button wire:click='postComment'
                class="mt-3 inline-flex items-center justify-center h-10 px-4 font-medium tracking-wide text-white transition duration-200 bg-gray-900 rounded-lg hover:bg-gray-800 focus:shadow-outline focus:outline-none">
                Post Comment
            </button>
        @endauth

        @guest
            <a wire:navigate class="text-green-500 font-bold underline py-1" href="{{ route('login') }}"> Login to Post
                Comments</a>
        @endguest

        <div class="user-comments px-3 py-2 mt-5">

            @forelse ($book->comments as $comment)
                <div
                    class="comment [&:not(:last-child)]:border-b border-gray-300 py-5 flex items-center justify-between">
                    <div>
                        <div class="user-meta flex mb-4 text-sm items-center">
                            <span class="mr-1">{{ $comment->user->name }}</span>
                            <span class="text-gray-500">.{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-justify text-gray-700  text-sm">
                            {{ $comment->comment }}
                        </div>
                    </div>
                    @if ($comment->user_id == Auth::user()?->id || Auth::user()?->isAdmin())
                        <div>
                            <button class="btn btn-error text-white btn-xs"
                                wire:click='deleteComment({{ $comment->id }})'>

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            @empty
                <div class="text-gray-500 text-center">
                    <span> No Comments Posted</span>
                </div>
            @endforelse
        </div>
    </div>


</article>
