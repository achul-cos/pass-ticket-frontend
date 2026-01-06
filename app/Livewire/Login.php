<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public ?string $login = null;
    public ?string $password = null;

    public function doLogin(): void
    {
        $this->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $guard = Auth::guard('penumpang');

        $auth = $guard->attempt(['email' => $this->login, 'password' => $this->password]) || $guard->attempt(['nomor_telepon' => $this->login, 'password' => $this->password]);

        if (!$auth) {
            $this->dispatch('modal-gagal', message: $res['message'] ?? 'Maaf, terjadi kesalahan autentikasi, silahkan coba lagi dengan data yang tepat.', title: 'Gagal Masuk Ke Akun Anda');
            return;
        }

        session()->regenerate();

        $this->redirectIntended(route('app.beranda'), navigate: true);
    }    

    public function render()
    {
        return view('livewire.login');
    }
}
