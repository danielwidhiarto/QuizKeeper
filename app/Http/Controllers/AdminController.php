<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class AdminController extends Controller
{
    public function downloadBackupFiles($id)
    {
        $transaction = Transaction::findOrFail($id);

        // Customize the ZIP filename
        $zipFileName = sprintf(
            'Backup_%s_%s_%s.zip',
            $transaction->exam_type,
            $transaction->subject_code,
            $transaction->class,
        );
        $zipFileName = str_replace(' ', '_', $zipFileName); // Replace spaces with underscores

        $fileContent = $transaction->file_content;

        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, $zipFileName);
    }

    public function deleteBackupFiles($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('success', 'Backup file deleted successfully.');
    }

    public function openFileExplorer($id)
    {
        $transaction = Transaction::findOrFail($id);
        $filePath = $transaction->file_path;

        // Ensure the file path is properly formatted for Windows
        $filePath = str_replace('/', '\\', $filePath);

        // Construct the command to open file explorer at the specific file path
        $command = 'explorer.exe /select,"' . $filePath . '"';

        $process = Process::fromShellCommandline($command);
        $process->run();

        // Check for execution errors
        if (!$process->isSuccessful()) {
            return redirect()->back()->with('error', 'Unable to open file explorer due to a command error.');
        }

        return redirect()->back()->with('success', 'File explorer opened successfully.');
    }
}
