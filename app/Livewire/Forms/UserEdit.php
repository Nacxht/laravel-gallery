<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class UserEdit extends Component
{
    use WithFileUploads;

    public $user;
    public $avatarCurrent;

    public $username;
    public $email;

    #[Validate('required|min:3')]
    public $fullName;

    #[Validate('nullable|min:8')]
    public $password;

    #[Validate('nullable|same:password')]
    public $confirmPassword;

    #[Validate('nullable|min:3')]
    public $address;

    #[Validate('nullable|sometimes|image|max:2024')]
    public $avatarNew;

    public function rules()
    {
        return [
            'username' => 'required|min:3|max:10|unique:users,username,' . Auth::id(),
            'email' => 'required|min:3|email|unique:users,email,' . Auth::id(),
        ];
    }

    public function userEdit()
    {
        $validated = $this->validate();

        // Avatar
        if ($this->avatarNew) {
            $file = $this->avatarNew;
            $filename = Str::slug($this->username) . '-' . date("Ymd") . '-' . time() . '-' . Str::random(10) . '.' . $file->getClientOriginalExtension();

            if (Auth::user()->avatar) {
                unlink(public_path('storage/img/avatar/' . Auth::user()->avatar));
            }

            User::find(Auth::id())
                ->update([
                    'avatar' => $filename,
                ]);

            $this->avatarNew->storeAs('img/avatar', $filename, 'public');
        }

        User::find(Auth::id())
            ->update([
                'username' => $this->username,
                'email' => $this->email,
                'full_name' => $this->fullName,
                'address' => $this->address,
            ]);

        $this->redirect('/profile/' . Auth::user()->username, navigate: true);
    }

    public function render()
    {
        $this->user = User::find(Auth::id());

        $this->username = $this->user->username;
        $this->email = $this->user->email;
        $this->fullName = $this->user->full_name;
        $this->address = $this->user->address;


        return view('livewire.forms.user-edit');
    }
}
