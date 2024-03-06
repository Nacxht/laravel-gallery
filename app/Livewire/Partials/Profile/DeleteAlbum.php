<?php

namespace App\Livewire\Partials\Profile;

use App\Models\Album;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class DeleteAlbum extends Component
{
    public $albumId;

    #[On('delete_album')]
    public function dispatchHandler($id)
    {
        $this->albumId = $id;
    }

    public function albumDelete()
    {
        Album::find($this->albumId)->delete();

        $this->redirect('/profile/' . Auth::user()->username . '/?tabContent=album', navigate: true);
    }

    public function render()
    {
        return view('livewire.partials.profile.delete-album');
    }
}
