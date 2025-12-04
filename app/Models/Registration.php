<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'class_id',
        'class_title',
        'class_level',
        'child_name',
        'dob',
        'school',
        'city',
        'wa',
        'language',
        'coding_experience',
        'note',
        'status',
    ];
}