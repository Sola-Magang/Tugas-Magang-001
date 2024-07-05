<?php

use App\Http\Controllers\profileDataController;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Facades\Route;

Route::get('/', [profileDataController::class, 'show'])->name('show');

// Route::get('/{category:slug}',[profileDataController::class, 'search'])->name('search');
Route::get('/category={category:slug}', function (category $category){
    dd($category);
    return view('list-siswa', ['title' => 'Daftar Siswa', 'school' => 'SMK Harapan', 'students' => $category->profdat]);
});

Route::get('/tambah', [profileDataController::class, 'add'])->name('pd.add');

Route::post('/submit', [profileDataController::class, 'submit'])->name('pd.submit');

Route::get('/edit/{slug}', [profileDataController::class, 'edit'])->name('pd.edit');

Route::post('/update/{slug}', [profileDataController::class, 'update'])->name('pd.update');

Route::post('/delete/{slug}', [profileDataController::class, 'delete'])->name('pd.delete');
