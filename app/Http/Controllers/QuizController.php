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
    }
    public function show($id=''){
        $request = $this->request; 
    }
    public function edit($id=''){
        $request = $this->request; 
    }
    public function store(){
        $request = $this->request; 
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