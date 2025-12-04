<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name', 'logo'];

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'album_partner');
    }
}
