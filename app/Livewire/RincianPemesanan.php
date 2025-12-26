<?php

namespace App\Livewire;

use Livewire\Component;

class RincianPemesanan extends Component
{
    public array $penumpang = [];
    public $jenisKendaraan = 'mobil';

    public $kapasitasKendaraan = [
        'motor' => 2,
        'mobil' => 6,
    ];

    public function mount()
    {
        $this->penumpang = [
            ['nama' => '', 'identitas' => '']
        ];
    }

    public function gantiKendaraan()
    {
        $batas = $this->kapasitasKendaraan[$this->jenisKendaraan];

        if (count($this->jumlahPenumpang) > $batas) {
            $this->penumpang = array_slice($this->penumpang, 0, $batas);
        }
    }

    public function tambahPenumpang()
    {
        if (count($this->penumpang) >= $this->kapasitasKendaraan[$this->jenisKendaraan]) {
            return;
        }
        
        $this->penumpang[] = ['nama' => '', 'identitas' => ''];
    }
    
    public function render()
    {
        return view('livewire.rincian-pemesanan');
    }
}
