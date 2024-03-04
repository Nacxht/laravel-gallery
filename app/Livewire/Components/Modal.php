<?php

namespace App\Livewire\Components;

use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
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

    #[On('main_modal')]
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
        return view('livewire.components.modal');
    }
}
