<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'pet_name',
        'species',
        'breed',
        'gender',
        'age',
        'weight',
        'status',
        'vaccines',
        'clinical_notes',
        'last_visit',
        'customer_name',
    ];

    protected $casts = [
        'last_visit' => 'date',
    ];
}