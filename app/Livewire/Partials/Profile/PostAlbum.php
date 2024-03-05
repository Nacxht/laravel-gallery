<?php

namespace App\Livewire\Partials\Profile;

use Livewire\Component;
use Livewire\Attributes\On;

class PostAlbum extends Component
{
    #[On('refreshPhoto')]
    public function refresh()
    {
        // 
    }

    public function render()
    {
        return view('livewire.partials.profile.post-album');
    }
}
