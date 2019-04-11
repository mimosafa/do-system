<?php

namespace App\Http\Controllers;

use App\FileApp\Models\File;
use App\Http\Requests\CreateFile;

class FileController extends Controller
{
    public function create()
    {
        return view('admin/files/create');
    }

    public function store(CreateFile $request)
    {
        $file = new File();
        $file->disk = 'public';
        $file->dir = 'uploads';
        $file->client_name = $request->client_name;
        $file->uploaded_file = $request->file;
        $file->save();

        return redirect()->back()->with('success_message', 'Success: ' . $file->url);
    }
}
