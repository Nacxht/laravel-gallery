<?php

namespace App\Livewire\Partials\Profile;

use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PhotoList extends Component
{
    public $photos = [];
    public $user;

    public function render()
    {
        $this->photos = Photo::where('user_id', '=', $this->user->id)->get();

        return view('livewire.partials.profile.photo-list');
    }
}
