<?php

use App\Http\Controllers\Patient;
use App\Http\Controllers\PDFGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('filament.patient.auth.login'));

Route::get('/pdf', [PDFGenerator::class, 'patientQrCode'])->name('patient.pdf');

Route::get('/patient/check/{qrCodeId}', [Patient::class, 'patientCheck'])->name('patient.check');
