<?php

namespace App\Http\Controllers;

use App\Enums\Localization;
use App\Helpers\Patient as HelpersPatient;
use App\Models\Patient as ModelsPatient;
use App\Models\PatientCheck;
use Illuminate\Http\Request;

class Patient extends Controller
{

    private function checkIn($patient)
    {
        PatientCheck::create([
            'patient_id' => $patient->id,
            'check_in' => now()
        ]);
    }

    private function checkOut($patientCheck)
    {
        $patientCheck->update([
            'check_out' => now()
        ]);
    }
    public function patientCheck(Request $request, $qrCodeId)
    {

        $patient = ModelsPatient::query()->where('qr_code', HelpersPatient::getPatienQrCodeEnv() . $qrCodeId)->first();

        if (isset($patient)) {

            $patientCheck = PatientCheck::query()->where('patient_id', $patient->id)
                ->whereDate('check_in', now())
                ->first();


            $isPatientCheckIn  = isset($patientCheck->check_in);

            if (!$isPatientCheckIn) {
                $this->checkIn($patient);

                return view('patient.patient-check', [
                    'label' => __(Localization::Patient->value . '.checks.patient_in', ['patient' => $patient->full_name])
                ]);
            } else if ($isPatientCheckIn) {
                $this->checkOut($patientCheck);

                return view('patient.patient-check', [
                    'label' => __(Localization::Patient->value . '.checks.patient_out', ['patient' => $patient->full_name])
                ]);
            }
        } else {

            return view('patient.no-patient', [
                'label' => __(Localization::Patient->value . '.no_patient')
            ]);
        }
    }
}
