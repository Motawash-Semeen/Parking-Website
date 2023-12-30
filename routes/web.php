<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\InvoiceController;
use App\Http\Controllers\Backend\SlotController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LocationController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserSlotController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
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
    Route::get('/direction/{id}', [LocationController::class, 'directionPage']);
    Route::get('/slot-value/{id}', [LocationController::class, 'getSlotValue']);
    Route::get('/slot-available/{id}', [LocationController::class, 'getAvailableSlot']);
    Route::get('/get-review/{id}', [ReviewController::class, 'getReview']);
    Route::post('/paymemt', [PaymentController::class, 'paymentPage']);
    Route::get('/congratulation', [PaymentController::class, 'congrtsPage']);
    Route::post('/stripe/payment', [PaymentController::class, 'makePayment'])->name('stripe.payment');
    Route::post('/cash/payment', [PaymentController::class, 'makeCashPayment'])->name('cash.payment');

    Route::post('/sslcommerz/pay2', [SslCommerzPaymentController::class, 'index2']);

});

Route::group(['middleware'=>[config('sslcommerz.middleware','web')]], function () {
    // Route::get('/sslcommerz/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    // Route::get('/sslcommerz/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/sslcommerz/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/sslcommerz/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/sslcommerz/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/sslcommerz/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/sslcommerz/cancel', [SslCommerzPaymentController::class, 'cancel']);

    Route::post('/sslcommerz/ipn', [SslCommerzPaymentController::class, 'ipn']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/addParking', [LocationController::class, 'addParking']);
    Route::post('/addParking', [LocationController::class, 'storeParking']);
    Route::get('invoice_download/{id}', [TransactionController::class, 'downloadInvoice'])->name('invoice.download');
    Route::get('write-review/{slot_id}/{id}', [ReviewController::class, 'writeReview'])->name('write.review');
});

Route::middleware(['checkUserId', 'auth'])->group(function () {
    Route::get('user/update-satus/{id}/{slotid?}', [UserSlotController::class, 'UpdateStatus'])->name('user.slots.status');
    Route::get('user/delete-slot/{id}', [UserSlotController::class, 'DeleteSlots'])->name('user.slots.delete');
    Route::get('user/edit-slot/{id}', [UserSlotController::class, 'EditSlots'])->name('user.slots.edit');
    Route::post('user/edit-slot/{id}', [UserSlotController::class, 'UpdateSlots'])->name('user.slots.update');
    Route::get('user/slot/delete-img/{id}/{img_id}', [UserSlotController::class, 'ImageDelete'])->name('user.slots.img-delete');
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
        Route::get('/all-review', [ReviewController::class, 'showReviews'])->name('admin.show.reviews');
        Route::get('/review-status/{id}', [ReviewController::class, 'statusReviews'])->name('admin.status.reviews');
        Route::get('/review-delete/{id}', [ReviewController::class, 'deleteReview'])->name('admin.delete.reviews');

        Route::get('/all-users', [UserController::class, 'showUsers'])->name('admin.show.users');
        Route::get('/user-status/{id}', [UserController::class, 'statusUser'])->name('admin.status.user');
        Route::get('/user-delete/{id}', [UserController::class, 'deleteUser'])->name('admin.delete.user');

        Route::get('/get-chart-data', [AdminController::class, 'getCartData']);
    });
});
