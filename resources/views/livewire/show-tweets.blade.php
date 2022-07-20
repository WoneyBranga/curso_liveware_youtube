<div>
    Show Tweets

    <p>{{ $content }}</p>
    <form method="post" wire:submit.prevent="create">
        <input type="text" name="content" id="content" wire:model="content" />
        <button type="submit"> criar tweet</button>
    </form>
    @error('content')
        {{ $message }}
    @enderror

    <br>

    @forelse ($tweets as $tweet)
        <p>
            {{ $tweet->user->name }} - {{ $tweet->content }}
        </p>
    @empty
        <p>sem tweets</p>
    @endforelse


    <hr>
    <div>
        {{ $tweets->links() }}
    </div>

</div>
