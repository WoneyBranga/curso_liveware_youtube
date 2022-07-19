<div>
    Show Tweets

    <p>{{ $message }}</p>

    <input type="text" name="message" id="message" wire:model="message" />

    <br>

    @forelse ($tweets as $tweet)
        <p>
            {{ $tweet->user->name }} - {{ $tweet->content }}
        </p>
    @empty
        <p>sem tweets</p>
    @endforelse

</div>
