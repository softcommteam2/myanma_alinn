<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SaleDateAdjustController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Voucher;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemSKUController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DateAdjust;

use App\Http\Controllers\TimeFrame;

use App\Http\Controllers\Record;
use App\Http\Controllers\Record\ByCusotmerOrByAccount;
use App\Http\Controllers\Record\RecordItemsController;
use App\Http\Controllers\Record\ItemSKUDetail;
use App\Http\Controllers\Record\ItemSKUSummary;
use App\Http\Controllers\Record\DailyReport;
use App\Http\Controllers\Record\RecordCustomerController;
use App\Http\Controllers\Record\RecordLedgerController;
use App\Http\Controllers\Register;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    if (auth()->check() && request()->path() == '/') {
        return redirect('home');
    }
    return view('auth.login');
});

Route::resource('/home', HomeController::class);

Route::resource('/sales', SalesController::class);
Route::post('/sales_cancel/{sales_id}', [SalesController::class, 'changeStatus']);
Route::get('/sales_showall', [SalesController::class, 'showAll']);
Route::get('/sales_search', [SalesController::class, 'search']);

Route::resource('/customer', CustomerController::class);
Route::get('api/customer/{id}', [CustomerController::class, 'getCustomer']);
Route::get('/customer_search', [CustomerController::class, 'search']);

Route::get('/dateadjust', [SaleDateAdjustController::class, 'index']);
Route::get('/dateadjust/{sales_id}/edit', [SaleDateAdjustController::class, 'edit']);
Route::post('/dateadjust/{sales_id}', [SaleDateAdjustController::class, 'update']);
Route::get('/dateadjust_search', [SaleDateAdjustController::class, 'search']);

Route::resource('/voucher', Voucher::class);
Route::resource('/test', TestController::class);

Route::resource('/register', Register::class);

Auth::routes();
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('users/index', [UserController::class, 'index'])->name('users.index');

// Route group
Route::group(['middleware' => 'useradmin'], function () {

    Route::resource('/accounts', AccountController::class);
    Route::get('/accounts_search', [AccountController::class, 'search']);
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

});

Route::resource('/items', ItemController::class);
Route::get('/items_search', [ItemController::class, 'search']);

Route::resource('/category', ItemCategoryController::class);
Route::get('/category_search', [ItemCategoryController::class, 'search']);

Route::resource('/ledger', RecordLedgerController::class);

Route::resource('/role', RoleController::class);
Route::get('/role_search', [RoleController::class, 'search']);
Route::resource('/users', UserController::class);
Route::get('/users_search', [UserController::class, 'search']);

Route::resource('/itemsku', ItemSKUController::class);
Route::get('/itemsku_search', [ItemSKUController::class, 'search']);

//Timeframe
Route::get('/timeframe', [TimeFrame::class, 'index']);
Route::post('/timeframe', [TimeFrame::class, 'getData']);
// ~~~~~~~~~~~~~~~~~~~~
//These are the codes for Daily Report
Route::get('/timeframe/today', [TimeFrame::class, 'today']);
Route::get('/timeframe/last3days', [TimeFrame::class, 'last3days']);
Route::get('/timeframe/last7days', [TimeFrame::class, 'last7days']);
Route::get('/timeframe/last10days', [TimeFrame::class, 'last10days']);
Route::get('/timeframe/last14days', [TimeFrame::class, 'last14days']);
// ~~~~~~~~~~~~~~~~~~~~
//THese are the codes for Weekly Report
Route::get('/timeframe/thisweek', [TimeFrame::class, 'thisweek']);
Route::get('/timeframe/previousweek', [TimeFrame::class, 'previousweek']);
//~~~~~~~~~~~~~~~~
//THese are the codes for Monthly Report
Route::get('/timeframe/thismonth', [TimeFrame::class, 'thismonth']);
Route::get('/timeframe/previousmonth', [TimeFrame::class, 'previousmonth']);
Route::get('/timeframe/bymonth', [TimeFrame::class, 'bymonth']);
Route::get('/timeframe/bymonth_search', [TimeFrame::class, 'bymonth_search']);
//~~~~~~~~~~~~~~~~
//THis is the codes for Yearly Report
Route::get('/timeframe/thisyear', [TimeFrame::class, 'thisyear']);
//~~~~~~~~~~~~~~~~
Route::get('/record', [Record::class, 'index']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/item_sku_detail', [ItemSKUDetail::class, 'index']);
Route::post('/record/item_sku_detail', [ItemSKUDetail::class, 'filterskudetail']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/item_sku_summary', [ItemSKUSummary::class, 'index']);
Route::post('/record/item_sku_summary', [ItemSKUSummary::class, 'filterskusummary']);
Route::get('/record/item_sku_summary_detail/{itemsku_id}/{start_date}/{end_date}', [ItemSKUSummary::class, 'detailsummary']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/ledger', [RecordLedgerController::class, 'index']);
Route::post('/record/ledger', [RecordLedgerController::class, 'getData']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/items', [RecordItemsController::class, 'index']);
Route::post('/record/items', [RecordItemsController::class, 'filterItem']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/daily_report', [DailyReport::class, 'index']);
// ~~~~~~~~~~~~~~~~~~~
Route::get('/record/customer_or_account', [ByCusotmerOrByAccount::class, 'index']);
Route::get('/record/cusoracc_search', [ByCusotmerOrByAccount::class, 'search']);

Route::get('test', function () {
    return view('test');
});
