<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/service', [HomeController::class,'service'])->name('service');

Route::get('/service2', [LocationController::class, 'inputPage']);
Route::get('/result', [LocationController::class, 'resultPage']);
Route::get('/payment', [HomeController::class, 'paymentPage']);
Route::get('/direction', [LocationController::class, 'directionPage']);
Route::get('/addParking', [LocationController::class, 'addParking']);




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/changePassword', [DashboardController::class, 'changePassword'])->name('password.change');
    Route::post('/deleteUser', [DashboardController::class, 'deleteUser'])->name('user.delete');
    Route::post('/photoUpload', [DashboardController::class, 'photoUpload'])->name('user.photoUpload');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/user/updateProfile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
});
