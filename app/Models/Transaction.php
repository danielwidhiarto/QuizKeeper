<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'exam_type', 'subject_code', 'exam_date', 'exam_start_time',
        'exam_duration', 'class', 'room', 'assistant_initial',
        'assistant_initial2', 'file_content'
    ];

    protected $dates = [
        'exam_date',
        'exam_start_time',
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_code', 'subject_code');
    }
}
