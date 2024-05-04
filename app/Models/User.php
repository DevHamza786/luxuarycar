<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Booking;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profileSetupComplete()
    {
        if ($this->status === 'incomplete') {
            return false;
        }

        return true;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'driver', 'id');
    }

    public function userRides()
    {
        return $this->hasMany(Booking::class, 'user_id', 'id');
    }

    public function driverData()
    {
        return $this->belongsTo(Driver::class, 'id', 'user_id');
    }

    public function driverDoc(){
        return $this->hasMany(DriveDoc::class,'user_id','id');
    }
}
