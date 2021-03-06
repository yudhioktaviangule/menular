<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DataTable;
use App\Http\Controllers\Api\FileCKManager;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'datatable'],function(){
    Route::get('dt_soal/{jenis}/{materi_id}/{smateri_id}',[DataTable::class,'dt_soal'])->name('dtb.soal');
    Route::get('dt_ujian/{jadwal_id}',[DataTable::class,'dt_ujian'])->name('dtb.ujian');
    Route::get('dt_person',[DataTable::class,'dt_person'])->name('dtb.person');
    Route::get('dt_jadwal',[DataTable::class,'dt_jadwal'])->name('dtb.jadwal');
    Route::get('dt_peserta',[DataTable::class,'dt_peserta'])->name('dtb.peserta');
});
Route::post("ckup",[FileCKManager::class,'upload'])->name('ck.up');