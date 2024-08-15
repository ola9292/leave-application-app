<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'holiday_request_type',
        'start_date',
        'end_date',
        'days_taken',
        'reason_for_holiday',
        'status',
    ];

    /**
     * Get the user that owns the holiday request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
