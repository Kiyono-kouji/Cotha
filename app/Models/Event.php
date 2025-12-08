<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'image',
        'category',
        'date',
        'location',
        'price',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function scopeUpcoming($query)
    {
        return $query->where('date', '>=', now())->orderBy('date');
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }
}