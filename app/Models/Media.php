<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'album_id',
        'type',
        'file',
        'caption'
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
