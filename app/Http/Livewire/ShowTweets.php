<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use Livewire\Component;

class ShowTweets extends Component
{
    public $message = 'apenas um teste';

    public function render()
    {
        //$tweets = Tweet::get(); // processo nao otimizado, gerando consultas desnecessarias...
        $tweets = Tweet::with('user')->get();

        return view('livewire.show-tweets', compact('tweets'));
    }
}
