<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalUjian;
use App\Models\Materi;
class SoalLatihanController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
        return view('page.soal.latihan.index');
    }
    public function create(){
        $request = $this->request;
        $data = Materi::get();
        return view('page.soal.latihan.create',compact('data'));
    }

    public function store(){
        $request           = $this->request; 
        $post              = $request->input();
        $post['json']      = json_encode($post['json']);
        $p                 = json_decode(json_encode($post));
        $post['jadwal_id'] = 0;
        $soal              = new SoalUjian();
        unset($post['_token']);
        $soal->fill($post);
        $soal->save();
        return redirect(route('soal_latihan.index'));
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
        $data = SoalUjian::find($id);
        if($data!=NULL):
            $data->delete();
        endif;
        return redirect()->back();
    }
}