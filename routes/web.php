<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\AuthController;

use App\Models\user;
use App\Models\Resume;

Route::get('/', function () {
    return view('home');
});
//=================================================resume builder===========================================================//

Route::get('/resume/build', function () {
    return view('resume.builder');
});

//==================================================store&create resume data================================================//
Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[ResumeController::class,'dashboard'])->name('dashboard');

    Route::get('/resume/create',[ResumeController::class,'create'])->name('resume.create');
    
    Route::post('/resume/store',[ResumeController::class,'store'])->name('resume.store');

    Route::get('/resume/{id}/preview',[ResumeController::class,'preview'])->name('resume.preview');

    Route::post('/resume/{id}/edit',[ResumeController::class,'edit'])->name('resume.edit');

    Route::put('/resume/{id}',[ResumeController::class,'update'])->name('resume.update');

    Route::delete('/resume/{id}',[ResumeController::class,'destroy'])->name('resume.destroy');

    Route::get('/resume/{id}',[ResumeController::class,'downloadPdf'])->name('resume.download');
});
// Route::post('/resume/store', [ResumeController::class, 'store'])
//     ->name('resume.store');

//===================================================preview of resume===============================================//
// Route::get('/resume/preview', [ResumeController::class, 'preview'])
//     ->name('resume.preview');
    
Route::get('/resume/{id}/preview', [ResumeController::class, 'preview'])->name('resume.preview')->middleware('auth');

//====================================================resume pdf download============================================//
Route::get('/resume/download', [ResumeController::class, 'downloadPdf'])->name('resume.download');

// ========================================================dashboard===============================================//
Route::get('/dashboard',[ResumeController::class,'dashboard'])->middleware('auth')->name('dashboard');

//===================================================admin dashboard/panel=========================================//
Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/adminpanel',function(){
        return view('admin.adminpanel');})->name('admin.adminpanel');
});
Route::middleware(['auth','admin'])->prefix('admin')->group(function(){

Route::get('/dashboard', function(){
    $totalUsers = User::count();
    $totalResumes = Resume::count();
    $users = User::latest()->take(5)->get();
        return view('admin.adminpanel', compact('totalUsers','totalResumes','users'));
        })->name('admin.adminpanel');

});


Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function(){
    
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::get('/users', [AdminController::class, 'users'])->name('users');

Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('users.delete');

Route::get('/resumes', [AdminController::class, 'resumes'])->name('resumes');

Route::delete('/resumes/{id}', [AdminController::class, 'deleteResume'])->name('resumes.delete');
});

//=============================================template=========================================================//
Route::get('/templates',[AdminController::class,'templates'])->name('templates');

Route::post('/templates/store',[AdminController::class,'storeTemplate'])->name('templates.store');

Route::post('templates/toggle.{id}',[AdminController::class,'toggleTemplate'])->name('templates.toggle');

Route::delete('template/{id}',[AdminController::class,'deleteTemplate'])->name('templates.delete');

//========================================================login====================================================//

Route::get('/login',[AuthController::class,'showlogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);
// -====================================================logiut=======================================================//
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

// ==============================================registrationn=======================================================//
Route::get('/register',[AuthController::class,'showregister'])->name('register');

Route::post('/register',[AuthController::class,'register']);