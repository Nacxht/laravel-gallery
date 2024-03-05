<?php

namespace App\Livewire\Components;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;
use Livewire\Attributes\On;

class ModalImage extends Component
{
    public $id;

    // Condition
    public bool $topDivider = false;
    public bool $bottomDivider = false;
    public bool $topClose = false;
    public bool $bottomClose = false;

    // Content Stuff
    public string $modalTitle;
    public string $componentName;

    // Class
    public string $modalTitleClass;

    #[On('image_modal')]
    public function modal(
        $id,
        $topDivider,
        $bottomDivider,
        $topClose,
        $bottomClose,
        $modalTitle,
        $componentName,
        $modalTitleClass
    ) {
        $this->id = $id;
        $this->topDivider = $topDivider;
        $this->bottomDivider = $bottomDivider;
        $this->topClose = $topClose;
        $this->bottomClose = $bottomClose;
        $this->modalTitle = $modalTitle;
        $this->componentName = $componentName;
        $this->modalTitleClass = $modalTitleClass;
    }

    public function render()
    {
        $photo = Photo::find($this->id);

        return view('livewire.components.modal-image', [
            'photo' => $photo,
        ]);
    }
}
