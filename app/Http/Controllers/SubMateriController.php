<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\BabMateri as SubMateri;
class SubMateriController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        if($request->mt==NULL):
            return redirect()->back();
        endif;
        $cek = Materi::find($request->mt);
        if($cek==NULL):
            return redirect()->back();
        endif;
        $data = SubMateri::where('materi_id',$cek->id)->get();
        return view('page.sub_materi.index',compact('data','cek'));
    }
    public function create(){
        $request = $this->request; 
        if($request->mt==NULL):
            return redirect()->back();
        endif;
        $cek = Materi::find($request->mt);
        if($cek==NULL):
            return redirect()->back();
        endif;
        return view('page.sub_materi.create',compact('cek'));
    }
    public function show($id=''){
        $request = $this->request; 
        $data = SubMateri::find($id);
        if($data!=NULL):
            $isi = json_decode($data->isi);
            $isi = $isi->materi;
            return view('page.sub_materi.show',compact('data','isi'));
        endif;
        return redirect()->back();
    }
    public function edit($id=''){
        $request = $this->request; 
        $data = SubMateri::find($id);
        if($data!=NULL):
            $cek = $data->getMateri();
            $isi = json_decode($data->isi);
            $isi = $isi->materi;
            return view('page.sub_materi.edit',compact('data','isi'));
        endif;
        return redirect()->back();
    }
    public function store(){
        $request = $this->request; 
        $post = $request->only('materi_id','bab');
        $mat = $request->only('materi');
        $post['isi'] = json_encode($mat);
        $submat = new SubMateri();
        $submat->fill($post);
        $submat->save();
        return redirect(route('sub_materi.index')."?mt=$post[materi_id]");
    }
    public function update($id=''){
        $request = $this->request; 
        $post = $request->only('bab','materi_id');
        $mat = $request->only('materi');
        $post['isi'] = json_encode($mat);
        $submat = SubMateri::find($id);
        $submat->bab = $post['bab'];
        $submat->isi = $post['isi'];
        $submat->save();
        return redirect(route('sub_materi.index')."?mt=$post[materi_id]");
    }
    public function destroy($id=''){
        $submat = SubMateri::find($id);
        if($submat!=NULL):
            $matid = $submat->materi_id;
            $submat->delete();
        endif;
        return redirect()->back();
    }
}