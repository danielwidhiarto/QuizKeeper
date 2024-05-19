<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\File;
use App\Models\Computer; // Import the File model

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use ZipArchive;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('Student.Upload');
    }

    public function upload(Request $request)
    {
        // Check if the user's IP address exists in the 'computers' table
        $computer = Computer::where('ip_address', $request->ip())->first();

        if (!$computer) {
            return redirect()->back()->with('error', 'Your IP address is not authorized to upload files.');
        }

        $request->validate([
            'file' => 'required|file|mimes:zip|max:25600',
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        // Validate file name length (assuming the 'name' column has a max length of 255 characters)
        if (strlen($fileName) > 255) {
            return redirect()->back()->with('error', 'The file name is too long. Please use a shorter file name.');
        }

        try {
            // Check if an existing file record exists for the same computer
            $existingFile = File::where('computer_id', $computer->id)->first();

            if ($existingFile) {
                // Update the existing file record with the new file data
                $existingFile->name = $fileName;
                $existingFile->size = $file->getSize();
                $existingFile->ip_address = $request->ip();
                $existingFile->content = file_get_contents($file->getRealPath());
                $existingFile->save();
            } else {
                // Create a new file record
                $uploadedFile = new File();
                $uploadedFile->name = $fileName;
                $uploadedFile->size = $file->getSize();
                $uploadedFile->ip_address = $request->ip();
                $uploadedFile->content = file_get_contents($file->getRealPath());
                $uploadedFile->computer_id = $computer->id;
                $uploadedFile->save();
            }

            return redirect()->back()->with('success', 'File uploaded successfully.');
        } catch (QueryException $e) {
            // Log the error for debugging purposes
            Log::error('Database error: ' . $e->getMessage());

            // Return a user-friendly error message
            return redirect()->back()->with('error', 'There was a problem uploading your file. Please try again.');
        }
    }

    public function deleteFile($id)
    {
        // Find the file by ID and delete it
        $file = File::findOrFail($id);
        $file->delete();
        // Redirect back with success message
        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    public function downloadFile($id)
    {
        // Find the file by ID
        $file = File::findOrFail($id);

        // Get the file content from the database
        $fileContent = $file->content;

        // Return the file content as a download response
        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, $file->name);
    }

    public function deleteAllFile()
    {
        // Delete all files
        File::truncate();
        // Redirect back with success message
        return redirect()->back()->with('success', 'All files deleted successfully.');
    }

    public function downloadAllFiles()
    {
        $files = File::all();

        if ($files->isEmpty()) {
            return redirect()->back()->with('error', 'No files available to download.');
        }

        $zip = new ZipArchive;
        $zipFileName = 'all_files.zip';
        $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);

        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $zip->addFromString($file->name, $file->content);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Could not create ZIP file.');
        }

        return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
    }
}
