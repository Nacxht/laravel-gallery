<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

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

    #[Validate('nullable|sometimes|image|max:2024')]
    public $avatar;

    public function userRegister()
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $file = $this->avatar;
            $filename = Str::slug($this->username) . '-' . date("Ymd") . '-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $this->avatar->storeAs('img/avatar', $filename, 'public');
        }

        User::create([
            'username' => Str::lower($this->username),
            'password' => $this->password,
            'email' => $this->email,
            'full_name' => $this->fullName,
            'address' => $this->address,
            'slug' => Str::slug($this->username),
        ]);

        session()->flash('status_success', 'Berhasil membuat user!');
        $this->redirect('/login', navigate: true);
    }

    #[Layout('layouts.auth-layout')]
    #[Title('Register')]
    public function render()
    {
        return view('pages.auth.register');
    }
}
