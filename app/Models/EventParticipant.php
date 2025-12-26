<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $fillable = [
        'event_team_id',
        'name',
        'email',
        'school'
    ];

    public function team()
    {
        return $this->belongsTo(EventTeam::class, 'event_team_id');
    }
}
