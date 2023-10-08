<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    use HasFactory;
    protected $fillable = ['previous_readings', 'current_readings', 'utilization_id'];
    public function utilization()
    {
        return $this->belongsTo('utilization', 'utilization_id');
    }
}