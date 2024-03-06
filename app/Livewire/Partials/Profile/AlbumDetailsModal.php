<?php

namespace App\Livewire\Partials\Profile;

use App\Models\Album;
use Livewire\Component;
use Livewire\Attributes\On;

class AlbumDetailsModal extends Component
{
    public $albumId;
    public $album;

    #[On('album_detail')]
    public function dispatchHandler($id)
    {
        $this->albumId = $id;
    }

    public function render()
    {
        $this->album = Album::find($this->albumId);

        return view('livewire.partials.profile.album-details-modal');
    }
}
