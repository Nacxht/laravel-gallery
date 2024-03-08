<?php

namespace App\Livewire\Forms;

use App\Models\Comment;
use App\Models\Photo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditComment extends Component
{
    public $commentId;
    public $comment;
    public $photo;

    #[Validate('required|min:3')]
    public $editCommentInput;

    public function editComment()
    {
        $validate = $this->validate();

        Comment::find($this->comment->id)->update([
            'comment' => $this->editCommentInput,
        ]);

        $this->dispatch(
            'main_modal',
            id: $this->photo->id,
            topDivider: true,
            bottomDivider: false,
            topClose: true,
            bottomClose: false,
            modalTitle: 'Comments',
            componentName: 'PhotoCommentModal',
            modalTitleClass: 'font-bold text-center',
        );
        $this->dispatch('photo_comment', id: $this->photo->id);
    }

    public function render()
    {
        $this->comment = Comment::find($this->commentId);
        $this->photo = Photo::find($this->comment->photo_id);
        $this->editCommentInput = $this->comment->comment;

        return view('livewire.forms.edit-comment');
    }
}
