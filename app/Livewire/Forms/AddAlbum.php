<?php

namespace App\Livewire\Forms;

use Exception;
use App\Models\Album;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class AddAlbum extends Component
{
    #[Validate('required|min:3')]
    public $albumName;

    #[Validate('required|min:3')]
    public $albumDescription;

    public function albumCreate()
    {
        $validated = $this->validate();

        try {
            Album::where('user_id', '=', Auth::id())
                ->where('album_name', '=', $this->albumName)
                ->firstOrFail();

            session()->flash('album-dupe', 'Album name exist!');
        } catch (Exception $err) {
            Album::create([
                'album_name' => Str::slug($this->albumName),
                'description' => $this->albumDescription,
                'create_at' => date('Y-m-d'),
                'user_id' => Auth::id(),
            ]);

            session()->flash('toast-success', 'Success adding an album');
            return $this->redirect('/profile/' . Auth::user()->username, navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.forms.add-album');
    }
}
