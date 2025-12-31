<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $fillable = [
        'invoice_number',
        'event_id',
        'guardian_name',
        'guardian_email',
        'guardian_phone',
        'total_teams',
        'total_price',
        'payment_status',
        'payment_token',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'total_teams' => 'integer'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function teams()
    {
        return $this->hasMany(EventTeam::class);
    }
}