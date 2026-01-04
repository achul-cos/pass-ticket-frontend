<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public ?array $penumpang = null;

    public function mount(): void 
    {
        $this->penumpang = session()->has('penumpang') ? session()->get('penumpang') : null;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
