<?php

use App\Livewire\Login;
use App\Livewire\Loading;
use App\Livewire\Navbar;
use App\Livewire\Beranda;
use App\Livewire\RincianTiket;
use App\Livewire\RincianPemesanan;
use App\Livewire\ETiket;
use App\Livewire\Profil;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Login::class)->name('login');
Route::get('/loading', Loading::class)->name('loading');
Route::get('/beranda', Beranda::class)->name('beranda');
Route::get('/rinciantiket', RincianTiket::class)->name('rincian-tiket');