<?php

namespace App\Livewire\Forms;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class EditPhoto extends Component
{
    use WithFileUploads;

    public $photoId;
    public $photo;
    public $filename;

    #[Validate('required|min:3')]
    public $photoTitle;

    #[Validate('required')]
    public $photoAlbum;

    #[Validate('required|min:3')]
    public $photoDescription;

    #[Validate('nullable|sometimes|image|max:3024')]
    public $photoContent;

    public $albums;
    public $isUploaded = false;

    #[On('edit_photo')]
    public function dispatchHandler(
        $id,
    ) {
        $this->photoId = $id;
        $this->photoContent = null;
    }

    public function mount()
    {
        $this->albums = Album::where('user_id', '=', Auth::id())->get();
    }

    // Update Photo
    public function photoUpdate()
    {
        $validated = $this->validate();

        if ($this->photoContent) {
            $file = $this->photoContent;
            $filename = Str::slug(Auth::user()->username) . '-' . Str::slug($this->photoTitle) . '-' . date("Ymd") . '-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            unlink(public_path('storage/img/photos/' . $this->photo->filename));
            $this->photoContent->storeAs('img/photos', $filename, 'public');

            Photo::find($this->photoId)
                ->update([
                    'filename' => $filename,
                ]);
        }

        Photo::find($this->photoId)
            ->update([
                'title' => Str::slug($this->photoTitle),
                'description' => $this->photoDescription,
                'album_id' => $this->photoAlbum,
                'user_id' => Auth::id(),
            ]);

        session()->flash('toast-success', 'Success uploading a photo');
        return $this->redirect('/profile/' . Auth::user()->username, navigate: true);
    }

    public function render()
    {
        $this->photo = Photo::find($this->photoId);

        $this->photoTitle = str_replace('-', ' ', $this->photo->title);
        $this->photoAlbum = $this->photo->album_id;
        $this->photoDescription = $this->photo->description;

        return view('livewire.forms.edit-photo');
    }
}
