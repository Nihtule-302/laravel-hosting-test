<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'price',
        'status',
        'type',
        'location',
        'duration',
    ];
    use HasFactory;

    public function payment(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }
}
