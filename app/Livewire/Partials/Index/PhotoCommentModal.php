<?php

namespace App\Livewire\Partials\Index;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;

class PhotoCommentModal extends Component
{
    public $comments;
    public $photoId;
    public $editCommentId;

    public $isEdit = false;

    #[Validate('required|min:3')]
    public $commentInput;

    public $editCommentInput;

    #[On('photo_comment')]
    public function dispatchHandler($id)
    {
        $this->photoId = $id;
    }

    #[On('comment_edit')]
    public function commentEditDispatch($id)
    {
        $this->isEdit = !$this->isEdit;
        $this->editCommentId = $id;

        $comment = Comment::find($id);
        // $this->editCommentInput = $comment->comment;
    }

    public function commentSend()
    {
        $validate = $this->validate();

        Comment::create([
            'comment' => $this->commentInput,
            'photo_id' => $this->photoId,
            'user_id' => Auth::id(),
            'commented_at' => date('Y-m-d'),
        ]);

        $this->commentInput = '';
    }

    public function render()
    {
        $this->comments = Comment::where('photo_id', '=', $this->photoId)->get();

        return view('livewire.partials.index.photo-comment-modal');
    }
}
