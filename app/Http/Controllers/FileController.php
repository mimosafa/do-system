<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Requests\CreateFile;
use Illuminate\Http\File as IlluminamteFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showCreateForm()
    {
        return view('/files/upload');
    }

    public function show(int $id)
    {
        return view('/files/show', [
            'file' => File::find($id),
        ]);
    }

    public function create(CreateFile $request)
    {
        $file = $request->file('blob');

        if (!$file->isValid()) {
            $errors = [];
            $errors[] = 'File is invalid.';
            return redirect()->back()->withInput()->withErrors($errors);
        }

        $fileModel = new File();
        $fileModel->disk = 'public';
        $fileModel->client_name = $request->client_name;
        $fileModel->file = $file;
        $fileModel->save();

        return redirect()->route('files.show', [
            'file' => $fileModel,
        ]);
    }
}
