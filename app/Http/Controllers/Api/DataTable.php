<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SoalUjian;
use App\Models\Peserta;
use App\Models\JadwalUjian;
use App\Models\PesertaUjian;
use DataTables AS DTB;
use Illuminate\Support\Facades\View;
use \Carbon\Carbon;
class DataTable extends Controller
{
    public function __construct() {
       // $this->middleware('apion');
    }
    public function dt_soal($jenis,$materi,$submateri)
    {
        $soal = SoalUjian::where('jenis',$jenis);
        if($materi=="0" && $submateri=='0'){
            $soal=$soal->get();
        }else{
            $soal = $soal->where('materi_id',$materi)
            ->where('bab_materi_id',$submateri)
            ->get();
        }

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
    public function dt_ujian($jadwal_id)
    {
        $soal = SoalUjian::where('jenis','tryout')
                    ->where('jadwal_id',$jadwal_id)->get();
        

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
    public function dt_person(){
        $soal = Peserta::get();

        $table = DTB::of($soal)
                    ->addIndexColumn()
                    ->addColumn('aksi',function($row){
                        $data = json_decode($row);
                        return View::make('page.peserta.buttons',compact('data'));
                    })
        ;
        return $table->make();
    }
    public function dt_jadwal(){
        $sekarang = Carbon::now();
        $soal = JadwalUjian::where('tanggal_ujian','>',$sekarang)->get();
        
        $table = DTB::of($soal)
                    ->addIndexColumn()
                    ->addColumn('aksi',function($row){
                        $data = json_decode($row);
                        return View::make('page.jadwal.buttons',compact('data'));
                    })
        ;
        return $table->make();
    }
    public function dt_peserta(){
        $sekarang = Carbon::now();
        $datax    = JadwalUjian::where('tanggal_selesai','>',$sekarang)->get(); 
        $ids      = [];
        foreach ($datax as $key => $value) {
            $ids[]=$value->id;
        }
       // dd($ids);
        $soal = PesertaUjian::whereIn('jadwal_id',$ids)
                ->where('verified_by','0')
                ->get();
        
        $table = DTB::of($soal)
                    ->addIndexColumn()
                    ->addColumn('aksi',function($row){
                        $data = json_decode($row);
                        return View::make('page.peserta_ujian.buttons',compact('data'));
                    });
        return $table->make();
    }
}
    

