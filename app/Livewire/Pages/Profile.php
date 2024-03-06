<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Profile extends Component
{
    public $username;
    public $tab = 'photo';

    #[On('profile_tab')]
    public function dispatchHandler($tab)
    {
        $this->tab = $tab;
    }

    #[Layout('layouts.app-layout')]
    #[Title('Gallery')]
    public function render()
    {
        $user = User::where('username', '=', $this->username)->first();

        return view('pages.profile', [
            'user' => $user,
        ]);
    }
}
