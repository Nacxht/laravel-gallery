<?php

namespace App\Livewire\Partials\Profile;

use App\Models\Album;
use Livewire\Component;

class AlbumList extends Component
{
    public $albums;
    public $user;

    public $count;

    public function mount()
    {
    }

    public function render()
    {
        $this->albums = Album::where('user_id', '=', $this->user->id)->get();

        return view('livewire.partials.profile.album-list');
    }
}
