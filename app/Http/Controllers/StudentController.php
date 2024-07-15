<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use App\Models\Files;
use Illuminate\Validation\Rules\File;
use Illuminate\Database\QueryException;

class StudentController extends Controller
{
    public function showUploadForm()
    {
        return view('Student.Upload');
    }

    public function upload(Request $request)
    {
        $computer = Computer::where('ip_address', $request->ip())->first();

        if (!$computer) {
            return redirect()->back()->with('error', 'Your IP address is not authorized to upload files.');
        }

        $request->validate([
            'file' => [
                'required',
                File::types(['zip'])
                    ->max(12 * 1024 * 1024), // 12 MB
            ],
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();

        if (strlen($fileName) > 255) {
            return redirect()->back()->with('error', 'The file name is too long. Please use a shorter file name.');
        }

        try {
            $existingFile = Files::where('computer_id', $computer->id)->first();

            if ($existingFile) {
                $existingFile->name = $fileName;
                $existingFile->size = $file->getSize();
                $existingFile->ip_address = $request->ip();
                $existingFile->content = file_get_contents($file->getRealPath());
                $existingFile->save();
            } else {
                $uploadedFile = new Files();
                $uploadedFile->name = $fileName;
                $uploadedFile->size = $file->getSize();
                $uploadedFile->ip_address = $request->ip();
                $uploadedFile->content = file_get_contents($file->getRealPath());
                $uploadedFile->computer_id = $computer->id;
                $uploadedFile->save();
            }

            $fileDetails = [
                'name' => $fileName,
                'size' => $file->getSize(),
                'uploaded_at' => now()->format('d F Y, H:i')
            ];

            return redirect()->back()->with('success', 'File uploaded successfully.')->with('fileDetails', $fileDetails);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'There was a problem uploading your file. Please try again.');
        }
    }
}
