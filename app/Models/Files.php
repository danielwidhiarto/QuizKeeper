<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'ip_address',
        'computer_id',
        'content',
    ];

    public function computer()
    {
        return $this->belongsTo(Computer::class);
    }

}
