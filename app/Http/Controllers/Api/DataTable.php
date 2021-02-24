<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalUjian;
use DataTables;
class DataTable extends Controller
{
    public function dt_soal($jenis,$materi,$submateri)
    {
        $soal = SoalUjian::where('jenis',$jenis)
                    ->where('materi_id',$materi)
                    ->where('bab_materi_id',$submateri)
                    ->get();

        $table = DataTables::of($soal)
                    ->addIndexColumn()
                    ->addColumn('aksi',function($row){
                        return 'aksi';
                    })
                    ;
        return $table->make();
    }
}
