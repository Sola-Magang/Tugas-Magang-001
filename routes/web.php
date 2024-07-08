<?php

use App\Http\Controllers\profileDataController;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Facades\Route;
$s = "";

Route::get('/', [profileDataController::class, 'show'])->name('show');

Route::get('/category={category:slug}', [profileDataController::class, 'categor'])->name('se.category');

Route::get('/tambah', [profileDataController::class, 'add'])->name('pd.add');

Route::post('/submit', [profileDataController::class, 'submit'])->name('pd.submit');

Route::get('/edit/{slug}', [profileDataController::class, 'edit'])->name('pd.edit');

Route::post('/update/{slug}', [profileDataController::class, 'update'])->name('pd.update');

Route::post('/delete/{slug}', [profileDataController::class, 'delete'])->name('pd.delete');

Route::post('/deleteMO', [profileDataController::class, 'deleteMO'])->name('pd.deleteMO');

Route::get('/login', [profileDataController::class, 'loginPage'])->name('pg.login');

Route::post('/login',[profileDataController::class, 'login'])->name('login');

Route::post('/logout',[profileDataController::class, 'logout'])->name('logout');