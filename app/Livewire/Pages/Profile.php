<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component
{
    public $username;

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
