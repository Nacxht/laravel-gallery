<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Layout('layouts.app-layout')]
    #[Title('Gallery')]
    public function render()
    {
        return view('pages.index');
    }
}
