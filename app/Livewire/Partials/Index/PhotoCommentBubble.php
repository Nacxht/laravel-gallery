<?php

namespace App\Livewire\Partials\Index;

use Livewire\Component;

class PhotoCommentBubble extends Component
{
    public $comment;

    public function render()
    {
        return view('livewire.partials.index.photo-comment-bubble');
    }
}
