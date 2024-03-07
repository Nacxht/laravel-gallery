<?php

namespace App\Livewire\Components;

use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use App\Models\PhotoLike;
use Illuminate\Support\Facades\Auth;

class ImagePostCard extends Component
{
    public $photo;
    public $photoData;

    public $commentsCount = 0;
    public $likesCount = 0;
    public $isLiked;

    public function mount()
    {
        $this->photo = [
            'data' => $this->photoData,
            'authorData' => User::find($this->photoData->user_id),
        ];

        $this->likesCount = PhotoLike::where('photo_id', '=', $this->photo['data']->id)->count();
        $this->commentsCount = Comment::where('photo_id', '=', $this->photo['data']->id)->count();

        // Like Checking
        $isUserLiked = PhotoLike::where('photo_id', '=', $this->photo['data']->id)
            ->where('user_id', '=', Auth::id())->first();

        if ($isUserLiked) {
            $this->isLiked = true;
        } else {
            $this->isLiked = false;
        }
    }

    public function photoLike()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!$this->isLiked) {
            PhotoLike::create([
                'photo_id' => $this->photo['data']->id,
                'user_id' => Auth::id(),
                'liked_at' => date('Y-m-d'),
            ]);

            $this->isLiked = true;
            $this->likesCount = PhotoLike::where('photo_id', '=', $this->photo['data']->id)->count();
        } else {
            PhotoLike::where('photo_id', '=', $this->photo['data']->id)
                ->where('user_id', '=', Auth::id())
                ->delete();

            $this->isLiked = false;
            $this->likesCount = PhotoLike::where('photo_id', '=', $this->photo['data']->id)->count();
        }
    }

    public function render()
    {
        return view('livewire.components.image-post-card');
    }
}
