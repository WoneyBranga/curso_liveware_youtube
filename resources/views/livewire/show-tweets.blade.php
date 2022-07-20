<div class="m-4 flex items-center justify-center">

    <div class="w-2/3  bg-gray-200  rounded shadow">

        <div class="relative  w-full font-bold text-gray-700 p-3 overflow:hidden bg-gray-300 shadow">
            Show Tweets
        </div>

        <div class='m-4 '>
            <form method="post" wire:submit.prevent="create">
                <input class="bg-gray-100 text-gray-800 rounded shadow" type="text" name="content" id="content"
                    wire:model="content" />
                <button type="submit"> criar tweet</button>
            </form>
            @error('content')
                {{ $message }}
            @enderror

            <br>
            <ul>

                @forelse ($tweets as $tweet)
                    <li class="flex">
                        <div class="text-gray-500">
                            {{ $tweet->user->name }} - {{ $tweet->content }}
                        </div>
                        @if ($tweet->likes->count())
                            <a href="#" class="font-bold text-red-500"
                                wire:click.prevent="unlike({{ $tweet->id }})">DEScurtir</a>
                        @else
                            <a href="#" class="font-bold text-sky-500"
                                wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                        @endif

                    </li>
                @empty
                    <li class='text-red-300 '>sem tweets</li>
                @endforelse
            </ul>


            <hr>
            <div>
                {{ $tweets->links() }}
            </div>

        </div>
    </div>
</div>
