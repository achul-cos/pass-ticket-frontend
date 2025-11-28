<main  class="h-full w-full">

    <livewire:navbar/>

    <div class="w-full h-full p-8 bg-white flex flex-col gap-8 pt-24">
        <h1 class="text-3xl font-bold">Selamat Datang, Akun!</h1>
        <!-- Section Tiket -->
        <section class="w-full bg-aqua p-6 rounded-xl border-2 border-black">
            <h2 class="text-2xl font-bold mb-4">Cari Tiket Anda</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    
                <div class="flex flex-col">
                    <label for="pelabuhanAsal" class="text-xl font-medium mb-1">Pelabuhan Asal</label>
                    <select name="pelabuhanAsal" class="p-2 rounded border border-black bg-abswhite w-full">
                        <option value=""disabled selected>Pilih Pelabuhan Asal</option>
                        <option>Pelabuhan Asal 1</option>
                        <option>Pelabuhan Asal 2</option>
                        <option>Pelabuhan Asal 3</option>
                    </select>
                </div>
    
                <div class="flex flex-col">
                    <label for="pelabuhanTujuan" class="text-xl font-medium mb-1">Pelabuhan Tujuan</label>
                    <select name="pelabuhanTujuan" class="p-2 rounded border border-black bg-abswhite w-full">
                        <option value=""disabled selected>Pilih Pelabuhan Tujuan</option>
                        <option>Pelabuhan Tujuan 1</option>
                        <option>Pelabuhan Tujuan 2</option>
                        <option>Pelabuhan Tujuan 3</option>
                    </select>
                </div>
    
                <div class="flex flex-col">
                    <label for="jadwalMasuk" class="text-xl font-medium mb-1">Jadwal Masuk Pelabuhan</label>
                    <div class="flex flex-col md:flex-row md:items-center gap-2">
                        <input type="date" name="tanggalMasuk" class="p-2 rounded border border-black bg-abswhite w-full">
                        <select name="jamMasuk" class="p-2 rounded border border-black bg-abswhite w-full">
                            <option value=""disabled selected>Pilih Jam</option>
                            <option>10:00 - 11:00</option>
                            <option>11:00 - 12:00</option>
                            <option>12:00 - 13:00</option>
                            <option>13:00 - 14:00</option>
                            <option>14:00 - 15:00</option>
                            <option>15:00 - 16:00</option>
                            <option>16:00 - 17:00</option>
                            <option>17:00 - 18:00</option>
                        </select>
                    </div>
                </div>
    
                <div class="flex flex-col">
                    <label for="jenisKendaraan" class="text-xl font-medium mb-1">Jenis Kendaraan</label>
                    <select name="jenisKendaraan" class="p-2 rounded border border-black bg-abswhite w-full">
                        <option value=""disabled selected>Pilih Jenis Kendaraan</option>
                        <option>Mobil</option>
                        <option>Motor</option>
                    </select>
                </div>
    
                <div class="flex flex-col">
                    <label for="penumpang" class="text-xl font-medium mb-1">Jenis Penumpang</label>
                    <select name="penumpang" class="p-2 rounded border border-black bg-abswhite w-full font-semibold">
                        <option value=""disabled selected>Pilih Jenis Penumpang</option>
                        <option>Dewasa</option>
                        <option>Lansia</option>
                        <option>Anak</option>
                        <option>Bayi</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-end mt-4">
                <button href="{{ route('rincian-tiket') }}" wire:navigate class="bg-yellow hover:bg-[#FFA000] text-abswhite font-semibold px-6 py-2 rounded-lg active:scale-90 transition duration-200">Cari Jadwal</button>
            </div>
        </section>
    
        <!-- Section Promo -->
        <section class="w-full bg-aqua p-6 rounded-xl border-2 border-black">
            <h2 class="text-2xl font-bold mb-4">Promo</h2>
            <div class="flex flex-col items-center justify-center py-10">
                <div class="bg-blue rounded-full p-6 mb-4">
                    <x-heroicon-o-x-mark class="w-10 h-10 text-abswhite"/>
                </div>
                <p class="text-lg font-semibold">Belum ada promo saat ini</p>
            </div>
        </section>
    </div>

</main>