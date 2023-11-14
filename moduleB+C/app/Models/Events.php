<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Channels;

class Events extends Model
{
    public $timestamps = false;
    public function Channels(){
        return $this->hasMany(Channels::class);
    }
    use HasFactory;
}
