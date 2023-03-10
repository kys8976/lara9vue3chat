<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded =[];
//    use HasFactory;
    public function from(){
        return $this->belongsTo(User::class,'from');
    }
    public function to(){
        return $this->belongsTo(User::class,'id');
    }
}
