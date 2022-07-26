<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    public $content = 'apenas um teste';

    protected $rules = ['content' => 'required|min:3|string|max:99'];

    public function render()
    {
        //$tweets = Tweet::get(); // processo nao otimizado, gerando consultas desnecessarias...
        $tweets = Tweet::with('user')->latest()->paginate(5);

        return view('livewire.show-tweets', compact('tweets'));
    }

    public function create()
    {
        $this->validate();

        // Tweet::create([
        //     'content' => $this->content,
        //     'user_id' => 1,
        // ]);

        auth()->user()->tweets()->create([
            'content' => $this->content,
        ]);

        $this->content = '';
    }

    public function like($idTweet)
    {
        $tweet = Tweet::find($idTweet);

        $tweet->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }
}
