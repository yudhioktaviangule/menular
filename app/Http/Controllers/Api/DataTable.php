<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalUjian;
use DataTables AS DTB;
use Illuminate\Support\Facades\View;
class DataTable extends Controller
{
    public function __construct() {
        $this->middleware('apion');
    }
    public function dt_soal($jenis,$materi,$submateri)
    {
        $soal = SoalUjian::where('jenis',$jenis)
                    ->where('materi_id',$materi)
                    ->where('bab_materi_id',$submateri)
                    ->get();

        $table = DTB::of($soal)
                    ->addIndexColumn()
                    ->addColumn('soal',function($row){
                        $data = json_decode($row);
                        $var = $data->isi;
                        return View::make('isi',compact('var'));
                    })
                    ->addColumn('jawaban',function($row){
                        $data = json_decode($row);
                        $x = json_decode($data->json);
                        $var  = '<ul>';
                        foreach($x->pilihan as $k =>$v):
                            $var.="<li><strong>$k</strong>:$v</li>";
                        endforeach;
                        $var .= '</ul>';
                        return View::make('isi',compact('var'));
                    })
                    ->addColumn('poin',function($row){
                        $data = json_decode($row);
                        $x = json_decode($data->json);
                        $var  = '<ul>';
                        foreach($x->jawaban as $k =>$v):
                            $var.="<li><strong>$k</strong>:$v</li>";
                        endforeach;
                        $var .= '</ul>';
                        return View::make('isi',compact('var'));
                    })
                    ->addColumn('aksi',function($row){
                        $data = json_decode($row);
                        return View::make('page.quiz.buttons',compact('data'));
                    })
                    ;
        return $table->make();
    }
}
