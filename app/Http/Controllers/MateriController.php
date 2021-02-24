<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
class MateriController extends Controller{
    private $request;
    public function __construct(Request $request){
        $this->request = $request; 
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request; 
        $data = Materi::all();
        return view('page.materi.index',compact('data'));
    }
    public function create(){
        $request = $this->request; 
        return view("page.materi.create");
    }
    public function show($id=''){
        $request = $this->request; 

        $data = Materi::find($id);
        return view('page.materi.show',compact('data'));
    }
    public function edit($id=''){
        $request = $this->request; 
        $data = Materi::find($id);
        return view('page.materi.edit',compact('data'));
    }
    public function store(){
        $request = $this->request; 
        $post = $request->only('name','poin_lulus');
        $materi = new Materi();
        $materi->fill($post);
        $materi->save();
        return redirect(route('materi.index'));
    }
    public function update($id=''){
        $request = $this->request; 
        $post = $request->only('name','poin_lulus');
        $materi = Materi::find($id);
        if($materi==NULL):
            return redirect(route('materi.index'));
        endif;
        $materi->name=$post['name'];
        $materi->poin_lulus=$post['poin_lulus'];
        $materi->save();
        return redirect(route('materi.index'));
    }
    public function destroy($id=''){
        $materi = Materi::find($id);
        if($materi==NULL):
        else:
            $materi->delete();
        endif;
        return redirect(route('materi.index'));
    }
}