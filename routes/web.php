<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminKategoriController;

// Ensure AdminUserController exists and is correctly imported


Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AdminAuthController::class, 'logout'])->middleware('auth');


Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index' 
    ];
    return view('admin.layouts.wrapper', $data);
});



Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin.dashboard.index' 
        ];
        return view('admin.layouts.wrapper', $data);
    });
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);
});




