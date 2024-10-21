<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;

    // register user
    public function save(){
    $this->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => [
        'required',
        'min:5',
        'max:255',
    ],
]);

    // Save to database
    $user = User::create([
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
    ]);

    // Login user
    Auth::guard()->login($user);

    return redirect()->intended();
}

    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
