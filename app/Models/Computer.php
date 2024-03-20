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

    // public function users()
    // {
    //     return $this->hasMany(User::class); // Assuming you want to define a one-to-many relationship
    // }
}
