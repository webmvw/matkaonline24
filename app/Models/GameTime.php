<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameTime extends Model
{
    use HasFactory;

    public function bazar(){
        return $this->belongsTo(Bazar::class, 'bazar_id', 'id');
    }
}
