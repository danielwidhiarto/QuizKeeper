<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'ip_address'
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
