<?php

namespace App\Http\Controllers;

use App\Models\Files;
use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Http\Request;
use ZipArchive;
use App\Models\Computer;
use Illuminate\Support\Facades\Log;

class TutorController extends Controller
{

    public function backupToServer(Request $request)
    {
        try {
            $request->validate([
                'subject_code' => 'required',
                'type' => 'required',
                'exam_date' => 'required|date',
                'start_time' => 'nullable|date_format:H:i',
                'duration' => 'nullable|integer|min:1',
                'class' => 'required|string',
                'room' => 'required',
                'proctor' => 'required|string',
                'proctor2' => 'nullable|string',
                'exam_terms' => 'required|string',
            ]);

            $subject = Subject::where('subject_code', $request->subject_code)->first();
            if (!$subject) {
                Log::error('Subject not found for subject code ' . $request->subject_code);
                return redirect()->back()->with('error', 'Subject not found for the provided code.');
            }

            $computers = Computer::where('room', $request->room)->pluck('id');
            $files = Files::whereIn('computer_id', $computers)->get();
            if ($files->isEmpty()) {
                Log::error('No files available to backup in room ' . $request->room);
                return redirect()->back()->with('error', 'No files available to backup in this room.');
            }

            $zip = new ZipArchive;
            $zipFileName = sprintf(
                'Backup_%s_%s_%s.zip',
                $request->type,
                $request->subject_code,
                $request->class,
            );
            $zipFileName = str_replace(' ', '_', $zipFileName);

            $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);

            if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
                foreach ($files as $file) {
                    $fileName = $file->name;
                    $fileContent = $file->content;

                    // Ensure unique file name
                    $filePath = $this->getUniqueFileName($zip, $fileName);
                    $zip->addFromString($filePath, $fileContent);
                }
                $zip->close();
            } else {
                Log::error('Failed to create ZIP file in room ' . $request->room);
                return redirect()->back()->with('error', 'Could not create ZIP file.');
            }

            $sanitizedExamTerms = str_replace('/', '-', $request->exam_terms);

            $baseDir = 'C:/QuizKeeperBackup/'
                . $sanitizedExamTerms . '/'
                . $request->exam_date . '/'
                . $request->subject_code . '-' . $subject->subject_name . '/'
                . $request->class . '/'
                . $request->type;

            if (!file_exists($baseDir)) {
                mkdir($baseDir, 0777, true);
            }

            $filePath = $baseDir . '/' . $zipFileName;

            if (file_put_contents($filePath, file_get_contents($tempFile)) === false) {
                Log::error('Failed to save ZIP file to ' . $filePath);
                return redirect()->back()->with('error', 'Failed to save backup file.');
            }

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
            $transaction->exam_terms = $request->exam_terms;
            $transaction->file_content = file_get_contents($tempFile);
            $transaction->file_path = $filePath;
            $transaction->save();
        } catch (\Exception $e) {
            Log::error('Failed to create transaction record: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create transaction record.');
        }

        return redirect()->back()->with('success', 'Backup created and saved to server successfully.');
    }

    /**
     * Generate a unique file name within the ZIP archive.
     *
     * @param ZipArchive $zip
     * @param string $fileName
     * @return string
     */
    private function getUniqueFileName(ZipArchive $zip, $fileName)
    {
        $i = 0;
        $name = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $newFileName = $fileName;

        while ($zip->locateName($newFileName) !== false) {
            $i++;
            $newFileName = $name . '(' . $i . ').' . $extension;
        }

        return $newFileName;
    }


    public function deleteAll(Request $request)
    {
        $request->validate([
            'room' => 'required|string',
        ]);

        $room = $request->room;

        // Fetch the computer IDs that belong to the specified room
        $computers = Computer::where('room', $room)->pluck('id');

        // Delete files associated with these computers
        Files::whereIn('computer_id', $computers)->delete();

        return redirect()->back()->with('success', "All files in room $room deleted successfully.");
    }

    public function downloadAll(Request $request)
    {
        $request->validate([
            'room' => 'required|string',
        ]);

        $room = $request->room;

        // Fetch the computer IDs that belong to the specified room
        $computers = Computer::where('room', $room)->pluck('id');

        // Get files associated with these computers
        $files = Files::whereIn('computer_id', $computers)->get();

        if ($files->isEmpty()) {
            return redirect()->back()->with('error', "No files available to download in room $room.");
        }

        $zip = new ZipArchive;
        $zipFileName = "all_{$room}_files.zip";  // Updated filename
        $tempFile = tempnam(sys_get_temp_dir(), $zipFileName);

        if ($zip->open($tempFile, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                $zip->addFromString($file->name, $file->content);
            }
            $zip->close();
        } else {
            return redirect()->back()->with('error', 'Could not create ZIP file.');
        }

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
        $computer = Computer::find($file->computer_id);

        $pcName = $computer ? $computer->name : 'unknown_computer';

        // Use the file's original name and extension
        $filename = $pcName . '_' . $file->name;

        $fileContent = $file->content;

        // Stream the file with the proper name and extension
        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, $filename);
    }
}
