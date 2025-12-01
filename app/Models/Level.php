<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'image',
        'age_range',
        'description',
        'slug',
        'active',
    ];

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_level', 'level_id', 'class_id');
    }
}
