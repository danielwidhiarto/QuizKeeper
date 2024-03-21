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

    // public function upload(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'size' => 'required',
    //         'file' => 'required|file|mimes:zip|max:10240', // Allow only ZIP files up to 10MB
    //     ]);

    //     // Retrieve the uploaded file
    //     $file = $request->file('file');

    //     // Store the file in the storage and get its path
    //     $filePath = $file->store('uploads');

    //     // Create a new File instance
    //     $newFile = new File([
    //         'name' => $request->name,
    //         'size' => $request->size,
    //         'file' => 'required|file|mimes:zip|max:10240', // Allow only ZIP files up to 10MB
    //         'ip_address' => $request->ip_address, // Assuming you're passing the IP address through the request
    //     ]);

    //     // Save the new file instance
    //     $newFile->save();

    //     return redirect()->back()->with('success', 'File uploaded successfully.');
    // }

}
