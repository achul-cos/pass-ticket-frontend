<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Client\RequestException;

class Daftar extends Component
{
    public ?string $name = null;
    public ?string $nomorTelepon = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $passwordConfirmation = null;

    public function doDaftar(): void
    {
        $payload = [
            'name' => $this->name,
            'nomor_telepon' => $this->nomorTelepon,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password,
        ];

        try {
            $res = Http::acceptJson()->post(config('services.api.base_url') . '/api/v1/penumpangs', $payload)->throw()->json();

            if (($res['status'] ?? null) === 'error') {
                $this->dispatch('modal-gagal', message: $res['message'] ?? 'Maaf, kami tidak dapat mendaftarkan anda akun. Silahkan Coba Lagi.', title: 'Gagal Mendaftarkan Akun');
                return;
            }

            $guard = Auth::guard('penumpang');

            $auth = $guard->attempt(['email' => $this->email, 'password' => $this->password]) || $guard->attempt(['nomor_telepon' => $this->nomorTelepon, 'password' => $this->password]);

            if (!$auth) {
                $this->dispatch('modal-gagal', message: $res['message'] ?? 'Maaf, terjadi kesalahan autentikasi, silahkan coba lagi dengan data yang tepat.', title: 'Gagal Masuk Ke Akun Anda');
                return;
            }

            session()->regenerate();

            $this->redirectIntended(route('app.beranda'), navigate: true);        

        } catch (RequestException $e) {
            $body = $e->response?->json();

            $message = $body['message'] ?? 'Maaf, kami tidak dapat mendaftarkan anda akun. Silahkan Coba Lagi.';

            $this->dispatch('modal-gagal', message: $message,title: 'Gagal Mendaftarkan Akun');
            return;
        }
    }

    public function render()
    {
        return view('livewire.daftar');
    }
}
