<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipsTrick;
class TipsTrickController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
        $data = TipsTrick::all();
        return view('page.tipstrik.index',compact('data'));
    }
    public function create(){
        $request = $this->request;
        return view('page.tipstrik.create');
    }
    public function store(){
        $request = $this->request;
        $post = $request->only('nilai','jenis');
        $post = json_decode(json_encode($post));
        $tip = [
            'tips' => $post->jenis=='tips' ? $post->nilai:"-",
            'trick' => $post->jenis=='trick' ? $post->nilai:"-",
        ];
        $tt = new TipsTrick();
        $tt->fill($tip);
        $tt->save();
        return redirect(route('trik.index'));

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
        TipsTrick::where('id',$id)->delete();
        return redirect()->back();
    }
}
