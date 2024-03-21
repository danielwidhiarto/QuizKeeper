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

        // Check if an existing file record exists for the same computer
        $existingFile = File::where('computer_id', $computer->id)->first();

        if ($existingFile) {
            // Update the existing file record with the new file data
            $existingFile->name = $file->getClientOriginalName();
            $existingFile->size = $file->getSize();
            $existingFile->ip_address = $request->ip();
            $existingFile->save();
        } else {
            // Create a new file record
            $uploadedFile = new File();
            $uploadedFile->name = $file->getClientOriginalName();
            $uploadedFile->size = $file->getSize();
            $uploadedFile->ip_address = $request->ip();
            $uploadedFile->computer_id = $computer->id;
            $uploadedFile->save();
        }

        return redirect()->back()->with('success', 'File uploaded successfully.');
    }
}
