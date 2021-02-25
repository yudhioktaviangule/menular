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
});
Route::post("ckup",[FileCKManager::class,'upload'])->name('ck.up');