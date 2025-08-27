<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vinyl extends Model
{
    public function label()
    {
        return $this->belongsTo(Label::class);
    }
}
