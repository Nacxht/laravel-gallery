<?php

namespace App\Livewire\Partials\Profile;

use App\Models\Photo;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class DeletePhoto extends Component
{
    public $photoId;

    #[On('delete_photo')]
    public function dispatchHandler($id)
    {
        $this->photoId = $id;
    }

    public function photoDelete()
    {
        Photo::find($this->photoId)->delete();

        $this->redirect('/profile/' . Auth::user()->username, navigate: true);
    }

    public function render()
    {
        return view('livewire.partials.profile.delete-photo');
    }
}
