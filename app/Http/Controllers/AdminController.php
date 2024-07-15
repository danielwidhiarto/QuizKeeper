<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class AdminController extends Controller
{
    public function downloadBackupFiles($id)
    {
        $transaction = Transaction::findOrFail($id);

        $fileContent = $transaction->file_content;

        return response()->streamDownload(function () use ($fileContent) {
            echo $fileContent;
        }, 'backup_' . $transaction->id . '.zip');
    }

}
