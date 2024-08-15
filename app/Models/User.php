<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const TOTAL_LEAVE_DAYS = 30;
    protected $fillable = [
        'name',
        'email',
        'password',
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
    // User.php (User Model)
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    public function leaveRequests()
    {
        return $this->hasMany(HolidayRequest::class);
    }
    public function remainingLeaveDays()
    {
        $daysTaken = $this->leaveRequests()
                    ->where('status', 'approved')
                    ->sum('days_taken');
        return self::TOTAL_LEAVE_DAYS - $daysTaken;
    }


}
