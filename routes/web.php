<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});
//=================================================resume builder===========================================================//

Route::get('/resume/build', function () {
    return view('resume.builder');
});

//==================================================store&create resume data================================================//
Route::middleware('auth')->group(function(){
    Route::get('/resume/create',[ResumeController::class,'create'])->name('resume.create');
    
    Route::post('/resume/store',[ResumeController::class,'store'])->name('resume.store');
});
// Route::post('/resume/store', [ResumeController::class, 'store'])
//     ->name('resume.store');

//===================================================preview of resume===============================================//
// Route::get('/resume/preview', [ResumeController::class, 'preview'])
//     ->name('resume.preview');
    
Route::get('/resume/{id}/preview', [ResumeController::class, 'preview'])
    ->name('resume.preview')
    ->middleware('auth');

//====================================================resume pdf download============================================//
Route::get('/resume/download', [ResumeController::class, 'downloadPdf'])
    ->name('resume.download');

// ========================================================dashboard===============================================//
Route::get('/dashboard',[ResumeController::class,'dashboard'])->middleware('auth')->name('dashboard');

//========================================================login====================================================//
Route::get('/login',[AuthController::class,'showlogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

// ==============================================registrationn=======================================================//
Route::get('/register',[AuthController::class,'showregister'])->name('login');
Route::post('/register',[AuthController::class,'register']);