<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'worker',
        'company',
        'hours',
        'rate_per_hour',
        'taxable',
        'status',
        'shift_type',
        'paid_at',
    ];

    protected $casts = [
        'taxable' => 'boolean',
        'paid_at' => 'datetime',
    ];
}
