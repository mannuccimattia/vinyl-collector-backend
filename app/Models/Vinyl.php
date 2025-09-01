<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
