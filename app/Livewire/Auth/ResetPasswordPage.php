<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Illuminate\Support\Str;

#[Title('Reset Password')]
class ResetPasswordPage extends Component
{
    public $token;
    #[Url]
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function save()
{
    $this->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed'
    ]);

    $status = Password::reset([
        'email' => $this->email,
        'password' => $this->password,
        'password_confirmation' => $this->password_confirmation,
        'token' => $this->token,
    ], function (User $user, string $password) {
        $user->forceFill([
            'password' => Hash::make($password),
        ])->setRememberToken(Str::random(60));
        $user->save();
        event(new PasswordReset($user));
    });

    // Menangani status dari reset
    if ($status === Password::PASSWORD_RESET) {
        session()->flash('success', 'Password has been reset successfully.');
        return redirect('/login');
    }

    switch ($status) {
        case Password::INVALID_TOKEN:
            session()->flash('error', 'This password reset token is invalid. Please try again.');
            break;
        case Password::INVALID_USER:
            session()->flash('error', 'No user found with this email address.');
            break;
        default:
            session()->flash('error', 'Failed to reset password. Please try again.');
    }
}

    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
