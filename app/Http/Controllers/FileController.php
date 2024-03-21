<?php

namespace App\Http\Controllers;
use App\Models\File; // Import the File model
use App\Models\Computer; // Import the File model

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }


    public function upload(Request $request)
    {
        // Check if the user's IP address exists in the 'computers' table
        $computer = Computer::where('ip_address', $request->ip())->first();

        if (!$computer) {
            return redirect()->back()->with('error', 'Your IP address is not authorized to upload files.');
        }

        $request->validate([
            'file' => 'required|file|mimes:zip|max:10240',
        ]);

        $file = $request->file('file');

        $uploadedFile = new File();
        $uploadedFile->name = $file->getClientOriginalName();
        $uploadedFile->size = $file->getSize();
        $uploadedFile->ip_address = $request->ip();
        $uploadedFile->computer_id = $computer->id;
        $uploadedFile->save();

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
