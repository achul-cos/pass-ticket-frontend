<?php

namespace App\Livewire\Modal;

use Livewire\Component;

class ModalDaftar extends Component
{
    public ?string $nama;
    public ?string $nomorTelepon;
    public ?string $email;
    public ?string $password;
    public ?string $passwordConfirmation;

    public function mount(): void 
    {
        //    
    }

    public function store(): void 
    {
        //
    }

    public function render()
    {
        return view('livewire.modal.modal-daftar');
    }
}
