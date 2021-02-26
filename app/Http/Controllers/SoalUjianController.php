<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Models\SoalUjian;
use App\Models\JadwalUjian;
use App\Models\Materi;
use Carbon\Carbon;
class SoalUjianController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
    }
    public function create(){
        $request = $this->request;
        $jadwal = $request->jadwal;
        if($jadwal==NULL):
            return redirect()->back();
        endif;
        $jadwal = JadwalUjian::find($jadwal);
        if($jadwal==NULL):
            return redirect()->back();
        endif;
        $data    = Materi::get();
        return view('page.soal.tryout.create',compact('data','jadwal'));
    }
    public function store(){
        $request = $this->request;
        $post    = $request->input();
        unset($post['_token']);
        $post['json']      = json_encode($post['json']);
        $post['jenis']      = 'tryout';
        $soal    = new SoalUjian();
        $soal->fill($post);
        $soal->save();
        return redirect(route('soal_ujian.utama',['jadwal'=>$post['jadwal_id']]));
    }
    public function show($id){
        $request = $this->request;
    }
    public function edit($id){
        $request = $this->request;
    }
    public function update($id){
        $request = $this->request;
    }
    public function destroy($id){
        $request = $this->request;
    }
    public function halaman_utama($jadwal_id='')
    {
        $jadwal = $jadwal_id;
        return view('page.soal.tryout.index',compact('jadwal'));
    }
}