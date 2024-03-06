<?php

namespace App\Livewire\Partials\Profile;

use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class PostAlbum extends Component
{
    #[Url(keep: true)]
    public $tabContent = 'photo';

    public $user;

    #[On('profile_tab')]
    public function dispatchHandler($tab)
    {
        $this->tabContent = $tab;
    }

    public function render()
    {
        return view('livewire.partials.profile.post-album');
    }
}
