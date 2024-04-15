<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function userData(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function driverData(){
        return $this->belongsTo(User::class,'driver','id');
    }
}
