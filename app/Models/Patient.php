<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'first_name',
        'second_name',
        'third_name',
        'fourth_name',
        'photo',
        'gender',
        'age'
    ];

    // Relationships

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
