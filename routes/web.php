<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\SoalLatihanController;
use App\Http\Controllers\SoalUjianController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\TipsTrickController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('materi', MateriController::class);
Route::resource('sub_materi', SubMateriController::class);
Route::resource('soal_latihan', SoalLatihanController::class);
Route::resource('soal_ujian', SoalUjianController::class);
Route::resource('peserta', PesertaController::class);
Route::resource('quiz', QuizController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('verif', VerifikasiController::class);
Route::resource('trik', TipsTrickController::class);
Route::get('ban-peserta/{id}', [PesertaController::class,'ban'])->name('peserta.ban');
Route::get('quiz.hal_utama/{sm}', [QuizController::class,'halaman_utama'])->name('quiz.utama');
Route::get('soal_ujian.hal_utama/{jadwal}', [SoalUjianController::class,'halaman_utama'])->name('soal_ujian.utama');

