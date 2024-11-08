<?php

use App\Http\Controllers\PDFGenerator;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('filament.patient.auth.login'));

Route::get('/pdf', [PDFGenerator::class, 'patientQrCode'])->name('patient.pdf');
