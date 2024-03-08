<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
    public $user;

    public function render()
    {
        $this->user = User::find($this->userId);

        return view('livewire.forms.user-edit');
    }
}
