<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_name',
        'meeting_room',
        'booking_date',
        'booking_time',
        'end_time',
    ];
}
