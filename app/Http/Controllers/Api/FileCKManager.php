<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class FileCKManager extends Controller
{
    private $request;
    public function __construct(Request $request) {
        $this->request = $request;
        $this->middleware('apion');
    }
    public function upload()
    {
        $request = $this->request;
        $file = $request->file('upload');
        $fileName = $file->getClientOriginalName();
        $fileExtension = ".{$file->getClientOriginalExtension()}";
        $fname = date('dmYHis')."-{$fileName}";
        $path = public_path("upd");
        $fileURL = asset("upd/$fname");
        $file->move($path,$fname);
        return response()->json(['status'=>'OK','name'=>$fileURL]);
    }
}
