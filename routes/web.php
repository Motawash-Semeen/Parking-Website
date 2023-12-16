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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', [LocationController::class, 'inputPage']);
Route::get('/faq', [HomeController::class, 'faqPage']);
Route::get('/privacy', [HomeController::class, 'privacyPage']);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/changePassword', [DashboardController::class, 'changePassword'])->name('password.change');
    Route::post('/deleteUser', [DashboardController::class, 'deleteUser'])->name('user.delete');
    Route::post('/photoUpload', [DashboardController::class, 'photoUpload'])->name('user.photoUpload');
    Route::get('/result', [LocationController::class, 'resultPage']);
    Route::get('/payment', [HomeController::class, 'paymentPage']);
    Route::get('/direction', [LocationController::class, 'directionPage']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addParking', [LocationController::class, 'addParking']);
    Route::post('/addParking', [LocationController::class, 'storeParking']);
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/user/updateProfile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
        
        Route::get('/all-slots', [AdminController::class, 'AllSlots'])->name('admin.slots');
        Route::get('/update-satus/{id}', [AdminController::class, 'UpdateStatus'])->name('admin.slots.status');
        Route::get('/delete-slot/{id}', [AdminController::class, 'DeleteSlots'])->name('admin.slots.delete');
        Route::get('/edit-slot/{id}', [AdminController::class, 'EditSlots'])->name('admin.slots.edit');
        Route::post('/edit-slot/{id}', [AdminController::class, 'UpdateSlots'])->name('admin.slots.update');
        Route::get('/slot/delete-img/{id}', [AdminController::class, 'ImageDelete'])->name('admin.slots.img-delete');
    });
});
