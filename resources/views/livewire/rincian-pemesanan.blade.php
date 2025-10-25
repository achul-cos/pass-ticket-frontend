<div class="w-full h-full">

    <livewire:navbar/>

    <div class="w-full h-full flex flex-col pt-24 p-8 gap-8">
        <div class="flex min-md:flex-row max-md:flex-col w-full h-full gap-8">
            <div class="flex flex-col gap-4 w-full h-full">
                <p class="text-2xl max-md:text-lg font-bold text-black">Detail Pesanan</p>
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Informasi Pemesan</div>
                    <div class="p-4 flex flex-col gap-2 pb-8">
                        <p class="py-2 text-lg text-black">Nama Pemesan</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="Nama Lengkap Anda">
                        <p class="py-2 text-lg text-black">Nomor Telepon</p>
                        <input type="number" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="0000-0000-0000">
                    </div>
                </div>
                <p class="text-2xl max-md:text-lg font-bold text-black">Detail Kendaraan</p>
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Kendaraan Penumpang</div>
                    <div class="p-4 flex flex-col gap-2 pb-8">
                        <p class="py-2 text-lg text-black">Jenis Kendaraan</p>
                        <select class="p-2 bg-white rounded-xl border-2 border-black" placeholder="Nama Lengkap Anda">
                            <option value="" disabled selected>Pilih Jenis Kendaraan Anda</option>
                            <option value="motor">Motor</option>
                            <option value="mobil">Mobil</option>
                        </select>
                        <p class="py-2 text-lg text-black">Nomor Kendaraan</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="BPXXXXAA">
                    </div>
                </div>                
                <p class="text-2xl max-md:text-lg font-bold text-black">Detail Penumpang</p>
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Identitas Penumpang 1</div>
                    <div class="p-4 flex flex-col gap-2 pb-8">
                        <p class="py-2 text-lg text-black">Nama Penumpang 1</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="Nama Penumpang 1">
                        <p class="py-2 text-lg text-black">Nomor Identitas</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="0123456789">
                    </div>
                </div>                
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Identitas Penumpang 2</div>
                    <div class="p-4 flex flex-col gap-2 pb-8">
                        <p class="py-2 text-lg text-black">Nama Penumpang 2</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="Nama Penumpang 2">
                        <p class="py-2 text-lg text-black">Nomor Identitas</p>
                        <input type="text" class="p-2 bg-white rounded-xl border-2 border-black" placeholder="0123456789">
                    </div>
                </div>
                <p class="text-sm">
                    Note :
                    Berdasarkan kebijakan pelabuhan, batas maksimal penumpang pada kendaraan motor yaitu 2 orang, dan pada kendaraan mobil yaitu 6 orang.
                </p>        
            </div>
            <div class="w-full h-full flex flex-col gap-4">
                <p class="text-2xl max-md:text-lg font-bold text-black">Detail Harga</p>
                <div class="bg-aqua border-2 border-black rounded-2xl">
                    <div class="text-2xl max-md:text-lg text-black p-4 border-b-2 border-black">Detail Biaya</div>
                    <div class="p-4 flex flex-col pb-8">
                        <p class="py-2 text-lg text-black w-full border-b-2 border-black/50">Rute Perjalanan</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">Batam</p>
                            <p>-></p>
                            <p class="font-bold">Karimun</p>
                        </div>
                        <p class="text-sm pb-2 font-italic">Biaya Perjalanan : Rp. 100.000 / Perjalanan </p>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jadwal Keberangakatan</p>
                        <div class="flex flex-row gap-2 text-base pt-4">
                            <p class="font-bold">Open Gate</p>
                            <p>=></p>
                            <p class="">10 November 2025, 12.00 WIB</p>
                        </div>
                        <div class="flex flex-row gap-2 text-base">
                            <p class="font-bold">Batas Keterlambatan</p>
                            <p>=></p>
                            <p class="">10 November 2025,  13.45 WIB</p>
                        </div>
                        <div class="flex flex-row gap-2 text-base">
                            <p class="font-bold">Keberangkatan</p>
                            <p>=></p>
                            <p class="">10 November 2025,  14.00 WIB</p>
                        </div>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jenis Kendaraan</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">Jenis Kendaraan</p>
                            <p>:</p>
                            <p class="font-bold">Motor</p>
                        </div>                        
                        <p class="text-sm pb-2 font-italic">Biaya Kendaraan : Rp. 100.000 (motor), Rp. 300.000 (mobil) </p>
                        <p class="py-2 pt-4 text-lg text-black full border-b-2 border-black/50">Jumlah Penumpang</p>
                        <div class="flex flex-row gap-2 text-lg pt-4">
                            <p class="font-bold">Jumlah Penumpang</p>
                            <p>:</p>
                            <p class="font-bold">2</p>
                        </div>                        
                        <p class="text-sm pb-2 font-italic">Biaya Penumpang : Rp. 50.000 / orang </p>
                    </div>
                    <div class="text-2xl max-md:text-lg text-black p-4 border-y-2 border-black">Total Biaya</div>
                    <div class="p-4 flex flex-col py-8">
                        <div class="flex flex-col gap-2 pb-8 border-b-2 border-black/50 border-dashed">
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Perjalanan</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>+ Rp. 100.000</span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Kendaraan</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>+ Rp. 100.000</span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya Penumpang</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>+ Rp. 100.000</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 py-8 border-b-2 border-black/50 border-dashed">
                            <div class="flex justify-between w-full text-sm">
                                <span>Biaya kotor</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>Rp. 300.000</span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Pajak PPN (11%)</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>+ Rp. 33.000</span>
                            </div>
                            <div class="flex justify-between w-full text-sm">
                                <span>Promo / Diskon</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>- Rp. 0</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2 pt-8 pb-4 text-lg font-bold">
                            <div class="flex justify-between w-full">
                                <span>Total Biaya</span>
                                <span class="flex-1 border-b border-dotted border-black mx-2"></span>
                                <span>Rp. 333.000</span>
                            </div>
                        </div>
                    </div>                    
                </div>  
            </div>            
        </div>
        <div class="flex flex-row gap-2 relative justify-start">
            <input type="checkbox" id="persetujuan" name="persetujuan" value="1" class="bg-white absolute top-1" required>
            <p class="text-sm ms-5">Dengan ini saya menyetujui seluruh syarat dan ketentuan, serta kebijakan dari pelabuhan berdasarkan regulasi yang telah ditetapkan negara. Jika suatu hari saya kedapatan melanggar, saya menerima seluruh kosenkuensi termaksud jalur hukum dan pembatalan layanan pelabuhan secara sepihak.</p>
        </div>         
        <button class="p-4 text-xl w-full rounded-full bg-orange border-dark text-white font-bold active:scale-98 duration-100 transition-all border-2">
            Pesan
        </button>
    </div>

</div>
