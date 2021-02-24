<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SubMateriController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('materi', MateriController::class);
Route::resource('sub_materi', SubMateriController::class);
Route::resource('soal', SoalController::class);
Route::resource('peserta', PesertaController::class);
Route::resource('quiz', QuizController::class);
Route::get('quiz.hal_utama/{sm}', [QuizController::class,'halaman_utama'])->name('quiz.utama');
