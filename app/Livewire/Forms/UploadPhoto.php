<?php

namespace App\Livewire\Forms;

use App\Models\Album;
use App\Models\Photo;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class UploadPhoto extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $photoTitle;

    #[Validate('required')]
    public $photoAlbum;

    #[Validate('required|min:3')]
    public $photoDescription;

    #[Validate('required|image|max:1024')]
    public $photoContent;

    public $albums;

    public function mount()
    {
        $this->albums = Album::where('user_id', '=', Auth::id())->get();
    }

    public function photoCreate()
    {
        $validated = $this->validate();
        $file = $this->photoContent;

        $filename = Str::slug(Auth::user()->username) . '-' . Str::slug($this->photoTitle) . '-' . date("Ymd") . '-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();

        Photo::create([
            'title' => Str::slug($this->photoTitle),
            'description' => $this->photoDescription,
            'filename' => $filename,
            'album_id' => $this->photoAlbum,
            'user_id' => Auth::id(),
            'uploaded_at' => date('Y-m-d'),
        ]);

        $this->photoContent->storeAs('img/photos', $filename, 'public');

        session()->flash('toast-success', 'Success uploading a photo');
        return $this->redirect('/profile/' . Auth::user()->username, navigate: true);
    }

    public function render()
    {
        return view('livewire.forms.upload-photo');
    }
}
