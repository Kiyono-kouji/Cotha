<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    protected $fillable = [
        'event_registration_id',
        'team_name'
    ];

    public function registration()
    {
        return $this->belongsTo(EventRegistration::class, 'event_registration_id');
    }

    public function participants()
    {
        return $this->hasMany(EventParticipant::class, 'event_team_id');
    }
}
