<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Profil extends Component
{
    public int $idPenumpang;

    public array $tikets = [
        'selesai' => [],
        'menungguVerifikasi' => [],
        'terverifikasi' => [],
        'dibatalkan' => [],
    ];

    // Filter inputs (sesuaikan nama param API)
    public ?string $filterRutePerjalanan = null;   // query: rutePerjalanan
    public ?string $filterWaktu = null;            // query: waktu
    public ?string $filterStatus = null;           // query: status    

    public function mount(): void {
        $this->idPenumpang = auth('penumpang')->user()->id;
        $this->fetchTikets();
    }

    public function updated($property, $value): void
    {
        if (str_starts_with($property, 'filter')) {
            $this->fetchTikets();
        }
    }     

    public function fetchTikets(): void
    {
        $params = array_filter([
            'idPenumpang' => $this->idPenumpang,
            'rutePerjalanan' => $this->filterRutePerjalanan,
            'waktu' => $this->filterWaktu,
            'status' => $this->filterStatus,
        ], fn ($v) => filled($v));

        try {
            $payload = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/tikets', $params)
                ->throw();

            $items = $payload['data'] ?? [];

            // reset groups tiap fetch
            $groups = [
                'selesai' => [],
                'menungguVerifikasi' => [],
                'terverifikasi' => [],
                'dibatalkan' => [],
            ];

            foreach ($items as $t) {
                $jadwal = $t['jadwal'] ?? [];
                $rawWaktu = $jadwal['waktuBerangkat'] ?? null;

                // Tentukan selesai berdasarkan waktuBerangkat < now()
                $dt = $rawWaktu ? Carbon::parse($rawWaktu) : null;

                if ($dt && $dt->isPast()) { // sudah lewat dari sekarang
                    // Optional: format tampilan
                    $t['jadwal']['waktuBerangkat'] = $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB';
                    $groups['selesai'][] = $t;
                    continue; // pastikan hanya masuk 1 kelompok
                }

                // Optional: format tampilan juga untuk yang belum selesai
                if ($dt) {
                    $t['jadwal']['waktuBerangkat'] = $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB';
                } else {
                    $t['jadwal']['waktuBerangkat'] = '-';
                }

                // Kelompokkan berdasarkan status (untuk tiket yang belum selesai)
                $status = $t['status'] ?? null;

                if ($status === 'menunggu_verifikasi') {
                    $groups['menungguVerifikasi'][] = $t;
                } elseif ($status === 'terverifikasi') {
                    $groups['terverifikasi'][] = $t;
                } elseif ($status === 'dibatalkan') {
                    $groups['dibatalkan'][] = $t;
                }
            }

            $this->tikets = $groups;

        } catch (\Throwable $th) {
            $this->dispatch(
                'modal-gagal',
                message: 'Maaf Data Tiket Tidak Dapat Di Tampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi',
                title: 'Gagal Menampilkan Tiket'
            );
        }
    }

    public function render()
    {
        return view('livewire.profil');
    }
}
