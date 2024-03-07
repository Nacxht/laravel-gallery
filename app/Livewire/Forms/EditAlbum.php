<?php

namespace App\Livewire\Forms;

use Exception;
use App\Models\Album;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class EditAlbum extends Component
{
    public $album;
    public $albumId;

    #[Validate('required|min:3')]
    public $albumName;

    #[Validate('required|min:3')]
    public $albumDescription;


    public function albumUpdate()
    {
        $validated = $this->validate();

        Album::find($this->albumId)->update([
            'album_name' => Str::slug($this->albumName),
            'description' => $this->albumDescription,
            'create_at' => date('Y-m-d'),
            'user_id' => Auth::id(),
        ]);

        session()->flash('toast-success', 'Success adding an album');
        return $this->redirect('/profile/' . Auth::user()->username . '/?tabContent=album', navigate: true);
    }

    public function render()
    {
        $this->album = Album::find($this->albumId);
        $this->albumName = str_replace('-', ' ', $this->album->album_name);
        $this->albumDescription = $this->album->description;

        return view('livewire.forms.edit-album');
    }
}
