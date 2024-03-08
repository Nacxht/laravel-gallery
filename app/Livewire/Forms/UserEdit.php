<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
    public $user;
    public $avatarCurrent;

    #[Validate('required|min:3|max:10|unique:users,username')]
    public $username;

    #[Validate('required|min:3|unique:users,email|email')]
    public $email;

    #[Validate('required|min:3')]
    public $fullName;

    #[Validate('required|min:8')]
    public $password;

    #[Validate('required|same:password')]
    public $confirmPassword;

    #[Validate('nullable|min:3')]
    public $address;

    #[On('nullable|sometimes|image|max:2024')]
    public $avatarNew;

    public function userEdit()
    {
        // 
    }

    public function render()
    {
        $this->user = User::find($this->userId);

        return view('livewire.forms.user-edit');
    }
}
