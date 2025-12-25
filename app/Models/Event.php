<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    protected $fillable = [
        'title', 'image', 'category', 'date', 'location', 'price'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    // Scope for upcoming events
    public function scopeUpcoming(Builder $query)
    {
        return $query->where('date', '>=', now())->orderBy('date');
    }

    // Scope for category filter
    public function scopeCategory(Builder $query, $category)
    {
        return $query->where('category', $category);
    }

    public function isFree()
    {
        return strtolower(trim($this->price)) === 'free' || $this->price == '0' || $this->price == null;
    }
}