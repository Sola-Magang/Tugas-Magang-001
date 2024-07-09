<?php

use App\Http\Controllers\linkController;
use App\Http\Controllers\profileDataController;
use App\Models\category;
use App\Models\profileData;
use Illuminate\Support\Facades\Route;
$s = "";

Route::get('/', [linkController::class, 'show'])->name('show')->middleware('auth');

Route::get('/category={category:slug}', [profileDataController::class, 'categor'])->name('se.category');

Route::get('/tambah', [linkController::class, 'add'])->name('pg.add')->middleware('auth');

Route::post('/submit', [profileDataController::class, 'submit'])->name('pd.submit');

Route::get('/edit/{slug}', [linkController::class, 'edit'])->name('pg.edit')->middleware('auth');

Route::post('/update/{slug}', [profileDataController::class, 'update'])->name('pd.update');

Route::post('/delete/{slug}', [profileDataController::class, 'delete'])->name('pd.delete');

Route::post('/deleteMO', [profileDataController::class, 'deleteMO'])->name('pd.deleteMO');

Route::get('/login', [linkController::class, 'loginPage'])->name('pg.login')->middleware('guest');

Route::post('/login',[profileDataController::class, 'login'])->name('login');

Route::get('/register', [linkController::class, 'register'])->name('pg.register')->middleware('guest');

Route::post('/regist', [profileDataController::class, 'regist'])->name('regist');

Route::post('/logout',[profileDataController::class, 'logout'])->name('logout');