<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\PesertaUjian;
use Illuminate\Auth\Events\Verified;

class VerifikasiController extends Controller{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('auth');
    }
    public function index(){
        $request = $this->request;
        return view('page.peserta_ujian.index');
    }
    public function create(){
        $request = $this->request;
    }
    public function store(){
        $request = $this->request;
    }
    public function show($id){
        $request = $this->request;
        $serta   = PesertaUjian::find($id);
        $ver     = Auth::id();
        $password = Hash::make($serta->password);
        $serta->verified_by=$ver;
        $serta->password = $password;
        $serta->save();
        return redirect()->back();
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
}