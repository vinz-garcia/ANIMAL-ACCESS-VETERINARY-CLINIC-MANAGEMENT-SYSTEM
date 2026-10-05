<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'pet_name',
        'breed',
        'customer_name',
        'service',
        'veterinarian',
        'appointment_date',
        'appointment_time',
        'status',
    ];
}