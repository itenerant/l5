<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function index()
    {
        return view('file.index');
    }

    public function upload(Request $request)
    {
        $data = $this->validate($request, [
            'file' => 'required|file|image',
        ]);


        $request->file->store('public/images');

        var_dump($request->file->path());
        var_dump($request->file->extension());

    }
}
