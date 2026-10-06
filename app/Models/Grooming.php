<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    protected $fillable = [
        'pet_name',
        'customer_name',
        'grooming_service',
        'groomer',
        'grooming_date',
        'grooming_time',
        'status',
    ];
}