<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tariff_id',
        'utilized',
        'cost'
    ];

    protected $table = 'utilization';
}