<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rooms;
use App\Models\Events;

class Channels extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function Rooms(){
        return $this->hasMany(Rooms::class);
    }
    public function Events(){
        return $this->belongsTo(Events::class);
    }
}
