<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JadwalUjian;
use Carbon\Carbon;
class JadwalController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
        return view('page.jadwal.index');
    }
    public function create(){
        $request = $this->request;
        return view('page.jadwal.create');
    }
    public function store(){
        $request  = $this->request;
        $post     = $request->only('tanggal_ujian','tanggal_selesai','buka_regis','tutup_regis','waktu_ujian');
        $post['waktu_ujian']*=60;
        $validasi = $this->validasi($post);
        if(!$validasi):
            return redirect()->back()->withInput($post);
        endif;
        $ujian = new JadwalUjian();
        $ujian->fill($post);
        $ujian->save();
        return redirect(route('jadwal.index'));
    }
    private function validasi($var)
    {
        $tmulai   = Carbon::parse($var['tanggal_ujian']);
        $tselesai = Carbon::parse($var['tanggal_selesai']);
        if($tmulai->gt($tselesai)):
            return false;
        endif;
        $tbuka  = Carbon::parse($var['buka_regis']);
        $ttutup = Carbon::parse($var['tutup_regis']);
        if($tbuka->gt($ttutup)):
            return false;
        endif;
        return true;
    }

    public function show($id){
        $request = $this->request;
        $data = JadwalUjian::find($id);
        if($data!=NULL):
            return view('page.jadwal.show',compact('data'));
        endif;
        return redirect()->back();
    }
    public function edit($id){
        $request = $this->request;
        $data = JadwalUjian::find($id);
        if($data!=NULL):
            return view('page.jadwal.edit',compact('data'));
        endif;
        return redirect()->back();
    }
    public function update($id){
        $request = $this->request;
        $data = JadwalUjian::find($id);
        $post     = $request->only('tanggal_ujian','tanggal_selesai','buka_regis','tutup_regis','waktu_ujian');
        $post['waktu_ujian']*=60;
        $validasi = $this->validasi($post);
        if(!$validasi):
            return redirect()->back();
        endif;
        foreach ($post as $key => $value) {
            $data->{$key} = $value;
        }
        $data->save();
        return redirect(route('jadwal.index'));
    }
    public function destroy($id){
        $request = $this->request;
    }
}