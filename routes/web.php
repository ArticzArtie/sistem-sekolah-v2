<?php

use App\Http\Controllers\MajorController;
use App\Http\Controllers\SchoolClass\IndexController;
use App\Http\Controllers\SchoolClass\CreateController;
use App\Http\Controllers\SchoolClass\DestroyController;
use App\Http\Controllers\SchoolClass\EditController;
use App\Http\Controllers\SchoolClass\ShowController;
use App\Http\Controllers\SchoolClass\StoreController;
use App\Http\Controllers\SchoolClass\UpdateController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/',function () {
    return view('welcome');
});

// Authentication
use App\Http\Controllers\AuthController;


// Authentication
Route::get('/login', [AuthController::class, 'loginview'])->name('login-view')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login-post')->middleware('guest');
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view')->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register-post')->middleware('guest'); 
Route::post('/logout',[AuthController::class ,'logout'])->name('logout')->middleware('auth');

// Manajemen data siswa (Action Controller)
Route::name('students.')->middleware(['role:student, teacher','auth'])->prefix('students')->group(function () {

    // Halaman daftar siswa
    Route::get('/', [StudentController::class, 'index'])->name('index');

    // Halaman tambah siswa
    Route::get('/create', [StudentController::class, 'create'])->name('create');

    // Logika tambah siswa
    Route::post('/', [StudentController::class, 'store'])->name('store');

    // Halaman detail siswa
    Route::get('/{student}', [StudentController::class, 'show'])->name('show');

    // Halaman edit siswa
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('edit');

    // Logika edit siswa
    Route::put('/{student}', [StudentController::class, 'update'])->name('update');

    // Logika hapus siswa
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('destroy');

});


// Manajemen data guru (Action Controller)
Route::name('teachers.')->middleware(['role:teacher','auth'])->prefix('teachers')->group(function () {

    // Halaman daftar guru
     Route::get('/', [TeacherController::class, 'index'])->name('index');

    // Halaman tambah guru
    Route::get('/create', [TeacherController::class, 'create'])->name('create');

    // Logika tambah guru
    Route::post('/', [TeacherController::class, 'store'])->name('store');

    // Halaman detail guru
    Route::get('/{id}', [TeacherController::class, 'show'])->name('show');

    // Halaman edit guru
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');

    // Logika edit guru
    Route::put('/{id}', [TeacherController::class, 'update'])->name('update');

    // Logika hapus guru
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');

});

// Manajemen data SchoolClass (invokeable)
    Route::name('classes.')->middleware(['role:teacher','auth'])->prefix('classes')->group(function () {

    // Halaman daftar classes
    Route::get('/',IndexController::class)->name('index');

    // Halaman tambah classes
    Route::get('/create', CreateController::class)->name('create');

    // Logika tambah classes
    Route::post('/', StoreController::class)->name('store');

    // Halaman detail classes
    Route::get('/{id}', ShowController::class)->name('show');

    // Halaman edit classes
    Route::get('/{id}/edit', EditController::class)->name('edit');

    // Logika edit classes
    Route::put('/{id}', UpdateController::class)->name('update');

    // Logika hapus classes
    Route::delete('/{id}', DestroyController::class)->name('destroy');

});

// Manajemen data Major (resource)
Route::resource('majors', MajorController::class)->middleware(['role:teacher','auth']);

