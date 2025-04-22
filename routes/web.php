<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

// Ensure AdminUserController exists and is correctly imported


Route::get('/login', [AdminAuthController::class, 'index']);
Route::post('/login/do', [AdminAuthController::class, 'doLogin']);
Route::get('/logout', [AdminAuthController::class, 'logout']);

Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index' 
    ];
    return view('admin.layouts.wrapper', $data);
});






Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin.dashboard.index' 
        ];
        return view('admin.layouts.wrapper', $data);
    });
    Route::resource('/user', AdminUserController::class);
});




