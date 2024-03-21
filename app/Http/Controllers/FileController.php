<?php

namespace App\Http\Controllers;
use App\Models\File; // Import the File model

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }


    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:zip|max:10240', // Allow only ZIP files up to 10MB
        ]);

        $file = $request->file('file');

        // Store the file in the storage/app/uploads directory
        $path = $file->store('uploads');

        // Create a new File record in the database
        $uploadedFile = new File();
        $uploadedFile->name = $file->getClientOriginalName(); // Get the original file name
        $uploadedFile->size = $file->getSize(); // Get the file size
        // $uploadedFile->ip_address = $request->ip(); // Get the IP address of the user who uploaded the file
        // $uploadedFile->path = $path; // Store the file path
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
