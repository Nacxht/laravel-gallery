<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use App\Models\Admin;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Login extends Component
{
    #[Validate('required|min:5|email')]
    public $email;

    #[Validate('required|min:8')]
    public $password;

    public function login()
    {
        $validate = $this->validate();
        $user = User::where('email', $this->email)->first();
        $admin = Admin::where('email', $this->email)->first();

        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect('/dashboard');
        }

        if (Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return $this->redirect('/', navigate: true);
        }

        if (!$user && !$admin) {
            session()->flash('emailNotFound', 'Akun tidak ditemukan!');
            return back();
        }

        session()->flash('password_fail', 'Password anda salah!');
        return back();
    }

    #[Layout('layouts.auth-layout')]
    #[Title('Login')]
    public function render()
    {
        return view('pages.auth.login');
    }
}
