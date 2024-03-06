<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function userLogout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return $this->redirect('/login', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.auth.logout');
    }
}
