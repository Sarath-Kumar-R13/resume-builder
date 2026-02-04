<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResumeController;

// Route::get('/', function () {
//     return view('welcome');
// });
//=================================================HOMEE===========================================================//

Route::get('/resume/build', function () {
    return view('resume.builder');
});

//==================================================store resume data================================================//
Route::post('/resume/store', [ResumeController::class, 'store'])
    ->name('resume.store');

//===================================================preview of resume===============================================//
Route::get('/resume/preview', [ResumeController::class, 'preview'])
    ->name('resume.preview');

//====================================================resume pdf download============================================//
Route::get('/resume/download', [ResumeController::class, 'downloadPdf'])
    ->name('resume.download');

