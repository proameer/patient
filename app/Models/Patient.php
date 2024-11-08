<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'first_name',
        'second_name',
        'third_name',
        'fourth_name',
        'qr_code',
        'photo',
        'gender',
        'age'
    ];

    /**
     * Boot function to handle model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Generate a UUID for qr_code on creating event
        static::creating(function ($patient) {
            if (empty($patient->qr_code)) {
                $patient->qr_code = Str::uuid();
            }
        });
    }


    /**
     * Get the checks for the patient.
     */
    public function checks()
    {
        return $this->hasMany(PatientCheck::class);
    }

    /**
     * Get the appointments for the patient.
     */
    public function appointments()
    {
        return $this->hasMany(PatientAppointment::class);
    }
}
