<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utilization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tariff_id',
        'utilized',
        'cost',
        'utilization_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class, 'tariff_id');
    }

    public function readings()
    {
        return $this->hasOne(Reading::class);
    }

    public function service()
    {
        $result = DB::table('utilization')
            ->select('services.id', 'services.name')
            ->join('tariffs', 'tariffs.id', '=', 'utilization.tariff_id')
            ->join('services', 'services.id', '=', 'tariffs.service_id')
            ->where('utilization.id', '=', $this->id)
            ->first();


        return $result;
    }

    protected $table = 'utilization';
}