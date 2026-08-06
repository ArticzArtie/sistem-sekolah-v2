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

// Manajemen data siswa (Action Controller)
Route::name('students.')->prefix('students')->group(function () {

    // Halaman daftar siswa
    Route::get('/', [StudentController::class, 'index'])->name('index');

    // Halaman tambah siswa
    Route::get('/create', [StudentController::class, 'create'])->name('create');

    // Logika tambah siswa
    Route::post('/', [StudentController::class, 'store'])->name('store');

    // Halaman detail siswa
    Route::get('/{id}', [StudentController::class, 'show'])->name('show');

    // Halaman edit siswa
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    // Logika edit siswa
    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    // Logika hapus siswa
    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');

});


// Manajemen data guru (Action Controller)
Route::name('teachers.')->prefix('teachers')->group(function () {

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
Route::name('classes.')->prefix('classes')->group(function () {

    // Halaman daftar classes
    Route::get('/',IndexController::class)->name('index');

    // Halaman tambah classes
    Route::get('/create', [CreateController::class])->name('create');

    // Logika tambah classes
    Route::post('/', [StoreController::class])->name('store');

    // Halaman detail classes
    Route::get('/{id}', [ShowController::class])->name('show');

    // Halaman edit classes
    Route::get('/{id}/edit', [EditController::class])->name('edit');

    // Logika edit classes
    Route::put('/{id}', [UpdateController::class])->name('update');

    // Logika hapus classes
    Route::delete('/{id}', [DestroyController::class])->name('destroy');

});

// Manajemen data Major (resource)
Route::resource('majors', MajorController::class);

