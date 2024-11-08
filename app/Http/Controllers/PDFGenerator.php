<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFGenerator extends Controller
{
    public function patientQrCode()
    {
        $qrCode = request()->query('qrCode');
        return view('filament.pages.patient-qr-code-print', [
            'qrCode' => $qrCode,
        ]);
    }
}
