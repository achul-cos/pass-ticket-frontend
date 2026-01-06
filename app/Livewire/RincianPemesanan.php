<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\On;

class RincianPemesanan extends Component
{
    public array $penumpang = [];
    public ?array $jadwals = [];  

    public string $jadwalId;

    public ?string $selectJenisKendaraan = null;
    public ?string $selectNomorKendaraan = null;
    public int $jumlahMaksimalPenumpang = 1;
    public int $jumlahPenumpang = 1;

    public ?string $inputLoginPenumpang = null;
    public ?string $inputPasswordPenumpang = null;

    public ?int $dataIdPenumpang = null;
    public ?string $dataNamaPenumpang = null;
    public ?string $dataNomorTeleponPenumpang = null;
    public ?string $dataEmailTeleponPenumpang = null;

    public bool $persetujuan = false;

    public $kapasitasKendaraan = [
        'motor' => 2,
        'mobil' => 6,
    ];


    public function mount(string $id): void
    {
        $this->jadwalId = $id;
        $this->fetchJadwal($id);
        $this->syncPenumpangInputs();
    }

    public function updated($property, $value): void 
    {
        if (str_starts_with($property, 'select')) {
            $this->fetchJadwal($this->jadwalId);
        }
        
        if ($this->selectJenisKendaraan === 'motor'){
            $this->jumlahMaksimalPenumpang = $this->kapasitasKendaraan['motor'];
            if ($this->jumlahPenumpang > $this->jumlahMaksimalPenumpang ) {
                $this->jumlahPenumpang = 2;
            }
        } elseif ($this->selectJenisKendaraan === 'mobil'){
            if ($this->jumlahPenumpang > $this->jumlahMaksimalPenumpang ) {
                $this->jumlahPenumpang = 6;
            }            
            $this->jumlahMaksimalPenumpang = $this->kapasitasKendaraan['mobil'];
        } else {
            $this->jumlahMaksimalPenumpang = 1;
        } 
    }

    public function tambahPenumpang()
    {
        if ($this->jumlahPenumpang >= $this->jumlahMaksimalPenumpang) return;

        $this->jumlahPenumpang++;
        $this->syncPenumpangInputs();
        $this->fetchJadwal($this->jadwalId);
    }

    public function kurangiPenumpang(): void
    {
        if ($this->jumlahPenumpang <= 1) {
            return;
        }

        // Kurangi jumlah input yang ditampilkan
        $this->jumlahPenumpang--;

        // Hapus data penumpang terakhir (index terakhir)
        unset($this->penumpang[$this->jumlahPenumpang]);

        // Rapikan index supaya kembali 0..n-1
        $this->penumpang = array_values($this->penumpang);

        // Kalau perlu refresh jadwal
        $this->fetchJadwal($this->jadwalId);
    }    

    public function fetchJadwal(string $id): void 
    {
        $params = array_filter([
            'no' => $id,
            'jenisKendaraan' => $this->selectJenisKendaraan,
            'jumlahPenumpang' => filled($this->selectJenisKendaraan)
                ? $this->jumlahPenumpang
                : null,
        ], fn ($v) => filled($v));

        try {
            $response = Http::acceptJson()
                ->get(config('services.api.base_url') . '/api/v1/jadwals', $params)
                ->throw();

            $this->jadwals = $response['data'] ?? [];

            $this->jadwals = collect($this->jadwals)
                ->map(function (array $t) {

                    $dt  = !empty($t['waktuBerangkat']) ? Carbon::parse($t['waktuBerangkat']) : null;
                    $dt2 = !empty($t['waktuTiba']) ? Carbon::parse($t['waktuTiba']) : null;

                    $t['waktuBerangkat'] = $dt
                        ? $dt->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB'
                        : '-';

                    $t['waktuTiba'] = $dt2
                        ? $dt2->locale('id')->translatedFormat('l, d F Y H:i') . ' WIB'
                        : '-';

                    return $t;
                })
                ->values()
                ->all();

        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Maaf Data Jadwal Tidak Dapat DiTampilkan, Karena Terdapat Gangguan Di Server, Silahkan Hubungi Teknisi', title: 'Gagal Menampilkan Jadwal');
            $this->jadwals = [];
        }
    }
    
    public function fecthPenumpang(): void 
    {
        try {
            $payload = [
                'login' => $this->inputLoginPenumpang,
                'password' => $this->inputPasswordPenumpang,
            ];

            $res = Http::acceptJson()
                ->post(config('services.api.base_url') . '/api/v1/penumpangs/validate', $payload)
                ->throw()
                ->json();

            $data = $res['data'] ?? null;

            if (!$data) {
                $this->dispatch('modal-gagal', message: $res['message'] ?? 'Login gagal', title: 'Gagal Verifikasi');
                return;
            }

            $this->dataIdPenumpang = $data['id'] ?? null;
            $this->dataNomorTeleponPenumpang = $data['nomorTelepon'] ?? null;
            $this->dataNamaPenumpang = $data['nama'] ?? null;
            $this->dataEmailTeleponPenumpang = $data['email'] ?? null;

            // opsional: tampilkan modal sukses / lanjut step berikutnya
            // $this->dispatch('modal-sukses', message: $res['message'] ?? 'Login berhasil', title: 'Berhasil');
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Gagal verifikasi. Informasi akun yang anda berikan tidak cocok, atau hubungi admin atau teknisi.', title: 'Gagal Verifikasi');
        }
    }

    public function pesanTiket(): void
    {
        if (! $this->siapPesan) {
            $this->dispatch('modal-gagal', message: 'Lengkapi data pemesanan terlebih dahulu.', title: 'Data belum lengkap');
            return;
        }

        try {
            $payload = [
                'penumpangId'    => $this->dataIdPenumpang,
                'jadwalId'       => (int) $this->jadwalId,
                'penumpangList'  => array_values(array_slice($this->penumpang, 0, $this->jumlahPenumpang)),
                'nomorKendaraan' => $this->selectNomorKendaraan,
                'jenisKendaraan' => $this->selectJenisKendaraan,
            ];

            $res = Http::acceptJson()
                ->post(config('services.api.base_url') . '/api/v1/tikets', $payload)
                ->throw()
                ->json();

            $tiketId = data_get($res, 'data.id');

            if (! $tiketId) {
                $this->dispatch('modal-gagal', message: $res['message'] ?? 'Gagal membuat tiket.', title: 'Gagal');
                return;
            }

            $this->redirectRoute('app.etiket.id', ['id' => $tiketId], navigate: true);
        } catch (\Throwable $th) {
            $this->dispatch('modal-gagal', message: 'Gagal membuat tiket. Silahkan coba lagi atau hubungi admin/teknisi.', title: 'Gagal');
        }
    }

    private function syncPenumpangInputs(): void
    {
        $max = min($this->jumlahPenumpang, 6); // 6 input: 0..5
        $this->penumpang = array_slice($this->penumpang, 0, $max);

        for ($i = 0; $i < $max; $i++) {
            if (!array_key_exists($i, $this->penumpang)) {
                $this->penumpang[$i] = ''; // default value
            }
        }
    }

    public function getSiapPesanProperty(): bool
    {
        // 1-3 & 4: data wajib terisi + checkbox true
        if (
            blank($this->dataIdPenumpang) ||
            blank($this->selectJenisKendaraan) ||
            blank($this->selectNomorKendaraan) ||
            $this->persetujuan !== true
        ) {
            return false;
        }

        // 5: jika jumlahPenumpang = N, maka penumpang[0..N-1] wajib terisi semua
        for ($i = 0; $i < $this->jumlahPenumpang; $i++) {
            if (blank($this->penumpang[$i] ?? null)) {
                return false;
            }
        }

        return true;
    }    
    
    public function daftarPenumpang(): void
    {

    }

    public function render()
    {
        return view('livewire.rincian-pemesanan');
    }
}
