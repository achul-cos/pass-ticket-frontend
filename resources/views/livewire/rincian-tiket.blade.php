<main class="h-full w-full">

    <livewire:navbar/>

    <div class="px-10 py-3 pt-18 bg-[#B8E5EA]">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-bold text-md">Asal → Tujuan</h2>
                <p>Hari, d m y</p>
                <p>Jenis Kendaraan, ~ Penumpang</p>
            </div>
            <button class="bg-yellow hover:bg-[#FFA000] text-white font-semibold px-4 py-2 rounded-lg transition duration-200">Ubah Jadwal</button>
        </div>
    </div>

    <div class="w-full h-full p-8 flex flex-col gap-8">

        <!-- Rincian Jadwal -->
        <section class="w-full bg-aqua p-6 rounded-xl border-2 border-black">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-lg">Tiket Tersedia (~)</p>
                    <h3 class="font-bold text-xl mt-1">Asal → Tujuan</h3>
                    <div class="mt-3">
                        <p class="text-lg">Jadwal Masuk Pelabuhan</p>
                        <p class="font-bold text-xl">Hari, d m y</p>
                        <p class="font-bold text-xl">00:00 - 00:00 WIB</p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-lg">Jenis Kendaraan</p>
                    <p class="font-bold text-xl">Jenis Kendaraan</p>
                    <p class="font-bold text-blue text-xl mt-2">Rp. 00.000</p>
                    <button class="bg-yellow hover:bg-[#FFA000] text-white font-semibold px-8 py-2 rounded-lg mt-3 transition duration-200">Beli Tiket</button>
                </div>
            </div>
        </section>

        <!-- Rincian Harga & Kebijakan -->
        <section class="w-full bg-aqua p-6 rounded-xl border-2 border-black" x-data="{tab : 'rincian' }">
            <div class="flex justify-between items-center border-b-2 border-black mb-3 text-lg font-semibold">
                <h4 @click="tab ='harga'" :class="tab=== 'harga' ? 'bg-orange text-white' : 'hover:bg-orange/20'" class="flex-1 text-center cursor-pointer transition-discrete px-4 min-md:rounded-t-lg transition-all duration-100">
                    Rincian Harga
                </h4>
                <h4 @click="tab ='kebijakan'" :class="tab=== 'kebijakan' ? 'bg-orange text-white' : 'hover:bg-orange/20'" class="flex-1 text-center cursor-pointer transition-discrete px-4 min-md:rounded-t-lg transition-all duration-100">
                    Kebijakan
                </h4>
            </div>
            <div class="text-sm space-y-2">
                <div class="flex justify-between">
                    <p>Jenis Kendaraan</p>
                    <p>Rp. 00.000</p>
                </div>
                <div class="flex justify-between">
                    <p>Penumpang (~ x Rp. 00.000)</p>
                    <p>Rp. 00.000</p>
                </div>
            </div>
            <div class="border-t border-black mt-3 pt-3 flex justify-between font-bold">
                <p>Total</p>
                <p>Rp. 00.000</p>
            </div>
        </section>

    </div>

</main>