<?php

namespace App\Livewire\Components;

use App\Models\Photo;
use Livewire\Component;
use Livewire\Attributes\On;

class ModalImageOverview extends Component
{
    public $photoId;
    public $photo;

    #[On('overview_modal')]
    public function dispatchHandler($id)
    {
        $this->photoId = $id;
    }

    public function render()
    {
        $this->photo = Photo::find($this->photoId);

        return view('livewire.components.modal-image-overview');
    }
}
