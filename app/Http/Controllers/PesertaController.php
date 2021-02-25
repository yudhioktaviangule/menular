<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
        return view('page.peserta.index');
    }
    public function create(){
        $request = $this->request;
    }
    public function store(){
        $request = $this->request;
    }
    public function show($id){
        $request = $this->request;
        $this->updateStatus('ya',$id);
        return redirect()->back();
    }

    public function updateStatus($status,$id)
    {
        $peserta = Peserta::find($id);
        $peserta->aktif=$status;
        
        $peserta->save();
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
    public function ban($id)
    {
        $this->updateStatus('tidak',$id);
        return redirect()->back();
    }

}