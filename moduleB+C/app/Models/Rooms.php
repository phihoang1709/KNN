<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Channels;
class Rooms extends Model
{
    use HasFactory;
    public $timestamps= false;
    public function Channels(){
        return $this->belongsTo(Channels::class);
    }
}
