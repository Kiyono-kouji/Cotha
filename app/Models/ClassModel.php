<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'title',
        'level',
        'image',
        'meeting_info',
        'description',
        'requirements',
        'note',
        'concepts',
        'projects',
        'button_link',
    ];

    protected $casts = [
        'requirements' => 'array',
        'concepts' => 'array',
        'projects' => 'array',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'class_course', 'class_id', 'course_id');
    }
}
