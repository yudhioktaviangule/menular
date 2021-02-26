<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoalUjian as Soal;
use App\Models\BabMateri;
class QuizController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
    }
    public function create(){
        $request = $this->request; 
        
        if($request->sm==NULL){
            return redirect(route('materi.index'));
        }
        $data=BabMateri::find($request->sm);
        if($data==NULL){
            return redirect(route('materi.index'));
        }
        return view('page.quiz.create',compact('data'));
    }
    public function show($id=''){
        $request = $this->request; 
        $data = Soal::find($id);
        if($data!=NULL):
            $mat = $data->bab_materi_id;
            $data->delete();
            redirect(route('quiz.utama',['sm'=>$mat]));
        endif;
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
        $post = $request->input();
        $post['json'] = json_encode($post['json']);
        $p = json_decode(json_encode($post));
        unset($post['_token']);
        $post['jadwal_id']=0;
        $soal = new Soal();
        $soal->fill($post);
        $soal->save();
        return redirect(route('quiz.utama',['sm'=>$p->bab_materi_id]));

    }
    public function update($id=''){
        $request = $this->request; 
    }
    public function destroy($id=''){
        #code
    }
    public function halaman_utama($sm_id)
    {
        $smat = BabMateri::find($sm_id);
        if($smat==NULL):
            return redirect()->back();
        endif;
        $data = Soal::where('jenis','q')->where('bab_materi_id',$sm_id)->get();
        return view('page.quiz.index',compact('smat','data'));
    }
}