<?php

namespace App\Livewire\Pages;

use App\Models\Photo;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Index extends Component
{
    public $photos;

    public function mount()
    {
        $this->photos = Photo::get()->sortByDesc('created_at');
    }

    #[Layout('layouts.app-layout')]
    #[Title('Gallery')]
    public function render()
    {
        return view('pages.index');
    }
}
