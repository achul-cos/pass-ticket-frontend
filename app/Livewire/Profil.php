<?php

namespace App\Livewire;

use Livewire\Component;

class Profil extends Component
{
    public $ticketSayaTab = "menungguVerifikasi";

    public function setTicketSayaTab ($tab)
    {
        $this->ticketSayaTab = $tab;
    }

    public function render()
    {
        return view('livewire.profil');
    }
}
