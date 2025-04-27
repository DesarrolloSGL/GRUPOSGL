<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Spam Protected
// Add <x-honeypot />
// Add Middleware to Route
Route::middleware(['throttle:global',ProtectAgainstSpam::class])->group(function () {
    // AUTH
    Auth::routes();
    Route::post('/register', [App\Http\Controllers\UsersController::class, 'register']);
    // MailForms
    Route::post('/refund-form', [App\Http\Controllers\MailController::class, 'refundForm']);
    Route::post('/claim-form', [App\Http\Controllers\MailController::class, 'claimForm']);
    Route::post('/deposit-form', [App\Http\Controllers\MailController::class, 'depositForm']);
    Route::post('/business-form', [App\Http\Controllers\MailController::class, 'businessForm']);
    // AppointmentController
    Route::get('/request-new-appointment', [App\Http\Controllers\AppointmentController::class, 'appointment']);
    Route::post('/request-new-appointment', [App\Http\Controllers\AppointmentController::class, 'newAppointment']);
    // AppointmentController
    // Route::get('/register-new-event', [App\Http\Controllers\AppointmentController::class, 'event']);
    // Route::post('/register-new-event', [App\Http\Controllers\AppointmentController::class, 'newEvent']);
    // Store
    Route::post('/store-quotation-get', [App\Http\Controllers\StoreController::class, 'storeQuotationGet']);
});

Route::middleware(['throttle:global'])->group(function () {
    Route::get('/test', [App\Http\Controllers\Controller::class, 'test']);
    Route::get('/test-store/{link}', [App\Http\Controllers\Controller::class, 'testStore']);
    Route::get('/test-cybersource', [App\Http\Controllers\Controller::class, 'testCybersource']);
    Route::get('/test-db', [App\Http\Controllers\Controller::class, 'testDb']);
    Route::get('/test-mail', [App\Http\Controllers\Controller::class, 'testMail']);
    Route::get('/test-factura/{id}', [App\Http\Controllers\Controller::class, 'testFactura']);
    Route::post('/test-delete', [App\Http\Controllers\Controller::class, 'testDelete']);

    Route::get('/guide', [App\Http\Controllers\Controller::class, 'guide']);
});

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/clear', [App\Http\Controllers\TestController::class, 'clear']);

// SuperAdmin Middleware
Route::middleware(['throttle:global','auth','verified','role:super-admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin-dashboard', [App\Http\Controllers\AdminController::class, 'dashboard']);
    Route::post('/admin-update-rates', [App\Http\Controllers\AdminController::class, 'updateRates']);
    Route::get('/admin-users-index', [App\Http\Controllers\AdminController::class, 'usersIndex']);

    // Intranet
    Route::post('/main-intranet-upload-file', [App\Http\Controllers\IntranetController::class, 'uploadFile']);
});

Route::middleware(['throttle:global','auth','verified','role:super-admin|admin|operator|accounting|storer|deliver'])->group(function () {
    // Store
    Route::get('/admin-store-index', [App\Http\Controllers\AdminController::class, 'storeIndex']);
    Route::get('/admin-store-quotations', [App\Http\Controllers\AdminController::class, 'storeQuotations']);
    Route::get('/admin-store-quotation/{order_number}', [App\Http\Controllers\AdminController::class, 'storeQuotation']);
    Route::post('/admin-store-quotation-send', [App\Http\Controllers\StoreController::class, 'storeQuotationSend']);
    Route::get('/admin-generate-quotation', [App\Http\Controllers\AdminController::class, 'generateQuotations']);
    Route::get('/admin-cost-center', [App\Http\Controllers\AdminController::class, 'CostCenter']);

    Route::post('/admin-role-asign', [App\Http\Controllers\AdminController::class, 'roleAsign']);
    Route::get('/admin-index', [App\Http\Controllers\AdminController::class, 'mainDashboard']);
    // Route::get("/admin-index", function(){return view("livewire.admin.main-dashboard");});
    // Route::get('/admin-index', [App\Http\Livewire\Admin\MainDashboard::class,'render']);
    // Route::get('/admin-index', App\Http\Livewire\Admin\MainDashboard::class);
    Route::get('/admin-order/{id}', [App\Http\Controllers\AdminController::class, 'order']);
    Route::get('/admin-order-search/{order_number}', [App\Http\Controllers\AdminController::class, 'orderSearch']);
    Route::post('/admin-order-delete', [App\Http\Controllers\AdminController::class, 'orderDelete']);
    Route::get('/admin-orders-paginate/{courier}/{filter}/{page}', [App\Http\Controllers\AdminController::class, 'ordersPaginate']);
    Route::post('/admin-order-confirm', [App\Http\Controllers\AdminController::class, 'orderConfirm']);
    Route::get('/admin-tracking-index', [App\Http\Controllers\AdminController::class, 'trackingIndex']);
    Route::post('/admin-tracking-asign', [App\Http\Controllers\AdminController::class, 'trackingAsign']);
    Route::get('/admin-payment-index', [App\Http\Controllers\AdminController::class, 'paymentIndex']);
    Route::post('/admin-order-add-extra-payment', [App\Http\Controllers\AdminController::class, 'addExtraPayment']);
    Route::get('/admin-quotations', [App\Http\Controllers\AdminController::class, 'quotationsIndex']);
    Route::get('/admin-orders', [App\Http\Controllers\AdminController::class, 'ordersIndex']);

    //Promo
    Route::get('/promo-index', [App\Http\Controllers\PromoController::class, 'index']);
    Route::post('/promo-add', [App\Http\Controllers\PromoController::class, 'add']);
    //Product
    Route::get('/product-index', [App\Http\Controllers\ProductController::class, 'index']);
    Route::post('/product-add', [App\Http\Controllers\ProductController::class, 'add']);

    //Tracking
    Route::post('/tracking-update', [App\Http\Controllers\TrackingController::class, 'update']);
    Route::get('/tracking-index', [App\Http\Controllers\TrackingController::class, 'index']);
    Route::get('/tracking-add', function() {return view('tracking.add');});
    Route::post('/tracking-add', [App\Http\Controllers\TrackingController::class, 'add']);
    Route::get('/tracking-add/{id}', [App\Http\Controllers\TrackingController::class, 'addToOrder']);
    Route::get('/tracking-update/{id}', [App\Http\Controllers\TrackingController::class, 'updateView']);
    Route::post('/tracking-update-tracking', [App\Http\Controllers\TrackingController::class, 'updateTracking']);
    Route::post('/tracking-update-status', [App\Http\Controllers\TrackingController::class, 'updateStatus']);
    Route::post('/tracking-delete', [App\Http\Controllers\TrackingController::class, 'delete']);
    Route::post('/tracking-search', [App\Http\Controllers\TrackingController::class, 'search']);
    Route::get('/tracking-paginate/{id}', [App\Http\Controllers\TrackingController::class, 'paginate']);

    // Payment
});

Route::middleware(['throttle:global','auth'])->group(function () {
    // Store
    Route::get('/store-checkout', [App\Http\Controllers\StoreController::class, 'storeCheckout']);

    // Billing
    Route::get('/upload-invoice', [App\Http\Controllers\BillingController::class, 'index']);
    Route::post('/upload-invoice', [App\Http\Controllers\BillingController::class, 'upload']);
    Route::get('/upload-invoice/{id}', [App\Http\Controllers\BillingController::class, 'uploadFromOrder']);
    Route::post('/upload-service-invoice', [App\Http\Controllers\BillingController::class, 'uploadServiceInvoice']);
    Route::get('/show-invoice/{id}', [App\Http\Controllers\BillingController::class, 'loadInvoice']);
    Route::post('/delete-invoice', [App\Http\Controllers\BillingController::class, 'deleteInvoice']);
    Route::get('/show-service-invoice/{id}', [App\Http\Controllers\BillingController::class, 'loadServiceInvoice']);
    Route::post('/delete-service-invoice', [App\Http\Controllers\BillingController::class, 'deleteServiceInvoice']);

    // Payment
    Route::get('/payment-proceed/{id}', [App\Http\Controllers\PaymentController::class, 'paymentProceed']);
});


Route::middleware(['throttle:global'])->group(function () {
    // Payment
    Route::post('/secure-transaction-response', [App\Http\Controllers\PaymentController::class, 'receipt']);

    //Tracking
    Route::post('/track', [App\Http\Controllers\TrackingController::class, 'track']);
    Route::get('/track', [App\Http\Controllers\TrackingController::class, 'getTrack']);

    //Cotizadores
    // Nacional
    Route::get('/national-quoter-index', [App\Http\Controllers\NationalQuoterController::class, 'index']);
    Route::post('/national-quoter-quotation', [App\Http\Controllers\NationalQuoterController::class, 'quotation']);
    Route::post('/national-quoter-order', [App\Http\Controllers\NationalQuoterController::class, 'quotationOrder']);
    Route::get('/national-quoter-order-index', [App\Http\Controllers\NationalQuoterController::class, 'quotationOrderIndex']);
    Route::post('/national-quoter-osc', [App\Http\Controllers\NationalQuoterController::class, 'quotationOSC']);
    Route::post('/national-quoter-finish', [App\Http\Controllers\NationalQuoterController::class, 'quotationFinish']);
    Route::get('/national-quoter-generate-osc/{id?}', [App\Http\Controllers\NationalQuoterController::class, 'oscPdf']);
    Route::get('/national-quoter-generate-guide/{id?}', [App\Http\Controllers\NationalQuoterController::class, 'guidePdf']);

    // Miami
    Route::get('/miami-quoter-index', [App\Http\Controllers\MiamiQuoterController::class, 'index']);
    Route::post('/miami-quoter-quotation', [App\Http\Controllers\MiamiQuoterController::class, 'quotation']);
    Route::post('/miami-quoter-order', [App\Http\Controllers\MiamiQuoterController::class, 'quotationOrder']);
    Route::get('/miami-quoter-order-index', [App\Http\Controllers\MiamiQuoterController::class, 'quotationOrderIndex']);
    Route::post('/miami-quoter-osc', [App\Http\Controllers\MiamiQuoterController::class, 'order']);
    Route::post('/miami-quoter-finish', [App\Http\Controllers\MiamiQuoterController::class, 'finish']);
    Route::get('/miami-quoter-generate-osc/{id?}', [App\Http\Controllers\MiamiQuoterController::class, 'oscPdf']);
    Route::get('/miami-quoter-generate-guide/{id?}', [App\Http\Controllers\MiamiQuoterController::class, 'guidePdf']);


    //China
    Route::get('/china-quoter-index', [App\Http\Controllers\ChinaQuoterController::class, 'index']);
    Route::post('/china-quoter-quotation', [App\Http\Controllers\ChinaQuoterController::class, 'quotation']);
    Route::post('/china-quoter-order', [App\Http\Controllers\ChinaQuoterController::class, 'quotationOrder']);
    Route::get('/china-quoter-order-index', [App\Http\Controllers\ChinaQuoterController::class, 'quotationOrderIndex']);
    Route::post('/china-quoter-osc', [App\Http\Controllers\ChinaQuoterController::class, 'order']);
    Route::post('/china-quoter-finish', [App\Http\Controllers\ChinaQuoterController::class, 'finish']);
    Route::get('/china-quoter-generate-osc/{id?}', [App\Http\Controllers\ChinaQuoterController::class, 'oscPdf']);
    Route::get('/china-quoter-generate-guide/{id?}', [App\Http\Controllers\ChinaQuoterController::class, 'guidePdf']);


    //Home
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/membership-table', [App\Http\Controllers\HomeController::class, 'membership']);


    // Store
    Route::get('/store-index', [App\Http\Controllers\StoreController::class, 'index']);
    Route::get('/store-marketplace-index', [App\Http\Controllers\StoreController::class, 'marketplaceIndex']);
    Route::get('/store-product/{sku}', [App\Http\Controllers\StoreController::class, 'marketplaceProductDetail']);

    Route::get('/store-mail-quotation/{$user}', [App\Http\Controllers\MailController::class, 'storeQuotationConfirm']);
    Route::get('/test-email-client', [App\Http\Controllers\StoreController::class, 'testEmailToClient']);
    Route::get('/tienda-quoter-generate-osc/{id?}', [App\Http\Controllers\StoreController::class, 'oscPdf']);
    Route::get('/tienda-quoter-generate-guide/{id?}', [App\Http\Controllers\StoreController::class, 'guidePdf']);



    //Footer
    Route::get('/about-us', function() {return view('footer.aboutUs');});
    Route::get('/our-history', function() {return view('footer.ourHistory');});
    Route::get('/work-with-us', function() {return view('footer.workWithUs.index');});
    Route::get('/work-with-us/category/{id}',  [App\Http\Controllers\HomeController::class, 'workWithUsCategory']);
    Route::get('/work-with-us/job/{id}',  [App\Http\Controllers\HomeController::class, 'workWithUsJob']);
    Route::get('/refund-form', function() {return view('footer.refundForm');});
    Route::get('/claim-form', function() {return view('footer.claimForm');});
    Route::get('/deposit-form', function() {return view('footer.depositForm');});
    Route::get('/business-form', function() {return view('footer.businessForm');});
    Route::get('/refund-politics', function() {return view('footer.refundPolitics');});
    Route::get('/deposit-politics', function() {return view('footer.depositPolitics');});
    Route::get('/business-politics', function() {return view('footer.businessPolitics');});
    Route::get('/payment-instructive', function() {return view('footer.paymentInstructive');});
});


Route::middleware(['throttle:global','auth','verified','role:super-admin|admin|operator|accounting|storer|deliver|client'])->group(function () {
    //Promo
    // Route::post('/promo-check', [App\Http\Controllers\PromoController::class, 'check']);
    //Store

    // Route::post('/store-cart-add', [App\Http\Controllers\StoreController::class, 'cartAdd']);
    // Route::get('/store-product-show/{link}', [App\Http\Controllers\StoreController::class, 'productShow']);
    // Route::get('/store-product-search/{search}', [App\Http\Controllers\StoreController::class, 'productSearch']);
    // Route::get('/store-cart-index', [App\Http\Controllers\StoreController::class, 'cartIndex']);
    // Route::post('/store-buy', [App\Http\Controllers\StoreController::class, 'buy']);
    //Users
    // Route::post('/address-add', [App\Http\Controllers\UsersController::class, 'addressAdd']);

    // store
    Route::get('/store-quotation-email-confirm/{order_number}', [App\Http\Controllers\StoreController::class, 'storeQuotationEmailConfirm']);
    Route::post('/store-quotation-client-confirm', [App\Http\Controllers\StoreController::class, 'storeQuotationClientConfirm']);

    Route::get('/profile', [App\Http\Controllers\UsersController::class, 'profile']);
    Route::post('/profile-update', [App\Http\Controllers\UsersController::class, 'profileUpdate']);
    Route::get('/locker', [App\Http\Controllers\UsersController::class, 'locker']);
    Route::get('/membership', [App\Http\Controllers\UsersController::class, 'membership']);
    Route::get('/user-orders', [App\Http\Controllers\UsersController::class, 'orders']);
    Route::get('/user-order/{id}', [App\Http\Controllers\UsersController::class, 'order']);

    Route::post('/rate-us', [App\Http\Controllers\HomeController::class, 'rateUs']);
});

Route::middleware(['throttle:global','auth','verified','role:super-admin|admin|accounting|storer-manager|storer|operator'])->group(function () {
    // sea
    Route::get('/main-sea', [App\Http\Controllers\SeaController::class, 'index']);

    // Intranet
    Route::get('/main-intranet', [App\Http\Controllers\IntranetController::class, 'index']);
    Route::get('/main-intranet-show-files', [App\Http\Controllers\IntranetController::class, 'showFiles']);
    Route::get('/main-intranet-show-file',  [App\Http\Controllers\IntranetController::class, 'showFile']);
    Route::post('/main-intranet-delete-file',  [App\Http\Controllers\IntranetController::class, 'deleteFile']);

    // Payment
    Route::post('/manual-payment-approval', [App\Http\Controllers\PaymentController::class, 'manualPaymentApproval']);
    Route::post('/upload-bank-note', [App\Http\Controllers\BillingController::class, 'uploadBankNote']);
    Route::get('/show-bank-note/{id}', [App\Http\Controllers\BillingController::class, 'loadBankNote']);
    Route::post('/delete-bank-note', [App\Http\Controllers\BillingController::class, 'deleteBankNote']);
});




// SuperAdmin Admin Operator
Route::middleware(['throttle:global','auth','verified','role:super-admin|admin|operator'])->group(function () {
    Route::get('/supplier-form', [App\Http\Controllers\SupplierController::class, 'supplierForm']);

});


// Isolated Payments
Route::middleware(['throttle:global',ProtectAgainstSpam::class])->group(function () {
    Route::get('/p@ymentSGL&KO762EIPXXM2dkFetICVCitSPsDsqPg4zCf9iGL9H7nyic9auA1cPX8WUh86EJuu4DhDwSmM7ehPGQIUdSEQvPtpXAWluwyVbySt', [App\Http\Controllers\PaymentController::class, 'isolated_payment']);
});