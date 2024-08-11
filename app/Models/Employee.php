<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'phone_number', 'gender', 'department'];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($employee) {
            $employee->user()->delete(); // Delete the associated user
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
