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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    protected $table = 'utilization';
}