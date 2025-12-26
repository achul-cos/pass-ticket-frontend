<?php

use App\Livewire\Login;
use App\Livewire\Daftar;
use App\Livewire\ETiket;
use App\Livewire\Loading;
use App\Livewire\Profil;
use App\Livewire\Beranda;
use App\Livewire\RincianTiket;
use App\Livewire\RincianPemesanan;
use Illuminate\Support\Facades\Route;

Route::get('/', Beranda::class)->name('beranda');
Route::get('/login', Login::class)->name('login');
Route::get('/daftar', Daftar::class)->name('daftar');
Route::get('/loading', Loading::class)->name('loading');
Route::get('/rinciantiket', RincianTiket::class)->name('rincian-tiket');
Route::get('/etiket', ETiket::class)->name('etiket');
Route::get('/etiket/{id}', ETiket::class)->name('etiket.id');
Route::get('/profil', Profil::class)->name('profil');
Route::get('/rincianpemesanan', RincianPemesanan::class)->name('rincian-pemesanan');
