<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $with = ['patient','items'];
    protected $fillable = [        
        'date_of_treatment',
        'start_time',
        'end_time',
        'description',
        'monto',
        'patient_id',
        'dentist_id',    
    ];
    protected $casts = [
        'date_of_treatment' => 'date',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function items()
    {
        return $this->hasMany(Appointment_item::class);
    }
}
