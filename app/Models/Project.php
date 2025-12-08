<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'id','title','creator','thumbnail','url','is_featured','active','project_date',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'active' => 'boolean',
        'project_date' => 'datetime',
    ];
}
