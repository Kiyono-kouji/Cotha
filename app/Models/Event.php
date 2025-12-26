<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    protected $fillable = [
        'event_category_id',
        'title',
        'description',
        'image',
        'registration_type',
        'max_team_members',
        'price_per_participant',
        'date',
        'last_registration_at',
        'location',
        'result'
    ];

    protected $casts = [
        'date' => 'datetime',
        'last_registration_at' => 'datetime',
        'price_per_participant' => 'decimal:2',
        'max_team_members' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function scopeUpcoming(Builder $query)
    {
        return $query->where('date', '>=', now())->orderBy('date');
    }

    public function isTeamBased()
    {
        return $this->registration_type === 'team';
    }

    public function isFree()
    {
        return $this->price_per_participant == 0;
    }
}