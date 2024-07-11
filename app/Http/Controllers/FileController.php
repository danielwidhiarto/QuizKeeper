<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Computer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use ZipArchive;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class FileController extends Controller
{
    public function showUploadForm()
    {
        return view('Student.Upload');
    }

    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'file' => 'required|mimes:zip|max:25600', // Maximum size 25MB
        ]);

        // Check if file is valid
        if ($request->file('file')->isValid()) {
            // Get the file size in bytes
            $file = $request->file('file');
            $size = $file->getSize();

            // Check if the file size is at least 10 KB (10 * 1024 bytes)
            if ($size < 10240) {
                return back()->withErrors(['file' => 'The file must be at least 10 KB.']);
            }

            // Check if the computer is authorized
            $computer = Computer::where('ip_address', $request->ip())->first();
            if (!$computer) {
                return back()->with('error', 'Your IP address is not authorized to upload files.');
            }

            // Check if an existing file record exists for the same computer
            $existingFile = Files::where('computer_id', $computer->id)->first();

            $name = $file->getClientOriginalName();
            $content = file_get_contents($file->getRealPath());

            if ($existingFile) {
                // Update the existing file record with the new file data
                $existingFile->name = $name;
                $existingFile->size = $size;
                $existingFile->ip_address = $request->ip();
                $existingFile->content = $content;
                $existingFile->save();
            } else {
                // Create a new file record
                $uploadedFile = new Files();
                $uploadedFile->name = $name;
                $uploadedFile->size = $size;
                $uploadedFile->ip_address = $request->ip();
                $uploadedFile->content = $content;
                $uploadedFile->computer_id = $computer->id;
                $uploadedFile->save();
            }

            return redirect()->back()->with('success', 'File uploaded successfully.');
        }

        return back()->withErrors(['file' => 'File upload failed.']);
    }

    public function deleteFile($id)
    {
        // Find the file by ID and delete it
        $file = Files::findOrFail($id);
        $file->delete();
        // Redirect back with success message
        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    public function downloadFile($id)
    {
        // Find the file by ID
        $file = Files::findOrFail($id);

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
        Files::truncate();
        // Redirect back with success message
        return redirect()->back()->with('success', 'All files deleted successfully.');
    }

    public function downloadAllFiles()
    {
        $files = Files::all();

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

    public function backupAllFiles(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'subject_code' => 'required',
            'type' => 'required',
            'exam_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'class' => 'required|string',
            'room' => 'required',
            'proctor' => 'required|string',
            'proctor2' => 'nullable|string',
        ]);

        // Retrieve all uploaded files
        $files = Files::all();

        // Check if there are any files to backup
        if ($files->isEmpty()) {
            return redirect()->back()->with('error', 'No files available to backup.');
        }

        // Create a ZIP archive
        $zip = new ZipArchive;
        $zipFileName = 'backup_' . time() . '.zip';
        $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);

        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $zip->addFromString($file->name, $file->content);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Could not create ZIP file.');
        }

        // Create a new transaction record and save the ZIP file content
        try {
            $transaction = new Transaction();
            $transaction->exam_type = $request->type;
            $transaction->subject_code = $request->subject_code;
            $transaction->exam_date = $request->exam_date;
            $transaction->exam_start_time = $request->start_time;
            $transaction->exam_duration = $request->duration;
            $transaction->class = $request->class;
            $transaction->room = $request->room;
            $transaction->assistant_initial = $request->proctor;
            $transaction->assistant_initial2 = $request->proctor2;
            $transaction->file_content = file_get_contents($tempFile); // Save the ZIP file content
            $transaction->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create transaction record.');
        }

        // Return the ZIP archive as a downloadable response
        return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
    }

    public function downloadBackupFiles($id)
    {
        // Retrieve the transaction by its ID
        $transaction = Transaction::findOrFail($id);

        // Get the file content from the database
        $fileContent = $transaction->file_content;

        // Return the file content as a download response
        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, 'backup_' . $transaction->id . '.zip');
    }
}
