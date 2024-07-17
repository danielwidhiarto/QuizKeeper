<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Transaction;
use Illuminate\Http\Request;
use ZipArchive;

class TutorController extends Controller
{
    public function backupToServer(Request $request)
{
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
        'exam_terms' => 'required|string', // New validation rule
    ]);

    $files = Files::all();

    if ($files->isEmpty()) {
        return redirect()->back()->with('error', 'No files available to backup.');
    }

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
        $transaction->exam_terms = $request->exam_terms; // Save the exam terms
        $transaction->file_content = file_get_contents($tempFile);
        $transaction->save();
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to create transaction record.');
    }

   return redirect()->back()->with('success', 'Backup created and saved to server successfully.');

}

    public function deleteAll()
    {
        Files::truncate();
        return redirect()->back()->with('success', 'All files deleted successfully.');
    }

    public function downloadAll()
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

        // Set success message in the session
        session()->flash('success', 'All files downloaded successfully.');

        return response()->download($tempFile, $zipFileName)->deleteFileAfterSend(true);
    }

    public function delete($id)
    {

        $file = Files::findOrFail($id);
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    public function download($id)
    {
        $file = Files::findOrFail($id);

        $fileContent = $file->content;

        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, $file->name);
    }

}
