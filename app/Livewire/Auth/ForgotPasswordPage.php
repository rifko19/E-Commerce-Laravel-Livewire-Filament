<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Forgot Password')]
class ForgotPasswordPage extends Component
{
    public $email;

    public function save()
{
    $this->validate([
        'email' => 'required|email|max:255',
    ]);

    $status = Password::sendResetLink(['email' => $this->email]);

    if ($status === Password::RESET_LINK_SENT) {
        session()->flash('success', 'Password reset link has been sent to your email address!');
        $this->email = '';
    } else {
        if ($status === Password::INVALID_USER) {
            session()->flash('error', 'This email address is not registered. Please check and try again.');
        } else {
            session()->flash('error', 'Failed to send password reset link. Please try again.');
        }
    }
}

    public function render()
    {
        return view('livewire.auth.forgot-password-page');
    }
}
