<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\SlotController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\PaymentController;
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
    Route::get('/slot-value/{id}', [LocationController::class, 'getSlotValue']);
    Route::get('/slot-available/{id}', [LocationController::class, 'getAvailableSlot']);
    Route::post('/paymemt', [PaymentController::class, 'paymentPage']);
    Route::post('/stripe/payment', [PaymentController::class, 'makePayment'])->name('stripe.payment');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addParking', [LocationController::class, 'addParking']);
    Route::post('/addParking', [LocationController::class, 'storeParking']);
    Route::get('invoice_download/{id}',[TransactionController::class,'downloadInvoice'])->name('invoice.download');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::post('/user/updateProfile', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
        
        Route::get('/all-slots', [SlotController::class, 'AllSlots'])->name('admin.slots');
        Route::get('/update-satus/{id}', [SlotController::class, 'UpdateStatus'])->name('admin.slots.status');
        Route::get('/delete-slot/{id}', [SlotController::class, 'DeleteSlots'])->name('admin.slots.delete');
        Route::get('/edit-slot/{id}', [SlotController::class, 'EditSlots'])->name('admin.slots.edit');
        Route::post('/edit-slot/{id}', [SlotController::class, 'UpdateSlots'])->name('admin.slots.update');
        Route::get('/slot/delete-img/{id}', [SlotController::class, 'ImageDelete'])->name('admin.slots.img-delete');
        Route::get('/all-transaction', [TransactionController::class, 'showTransaction'])->name('admin.show.transaction');
    });
});
