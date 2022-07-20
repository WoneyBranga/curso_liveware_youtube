<?php

namespace App\Http\Livewire\User;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
    use WithFileUploads;

    public $photo = null;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }


    public function upload()
    {
        $this->validate([
            'photo' => 'required|image|max:1024'
        ]);

        // @var $user  User::class
        $user = auth()->user();

        $nameFile = Str::slug($user->name) . "." .
            $this->photo->getClientOriginalExtension();

        if ($path = $this->photo->storeAs('public/users', $nameFile)) {
            $user->update([
                'profile_photo_path' => $path
            ]);
        }
        return redirect()->route('tweets.index');
    }
}
