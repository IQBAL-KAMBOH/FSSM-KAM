<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

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

Route::get('/gettime', function() {
    $time = date('Y-m-d H:i:s');
    return response()->json(['time' => $time]);
});
Route::POST('/custom-login',[App\Http\Controllers\User\UserController::class, 'customLogin']);

Route::POST('checkRefral', [App\Http\Controllers\User\UserController::class, 'checkRefral']);
Route::get('/', function () {
    return view('LandingPageTwo.index');
});

// frontPages Routes
Route::get('/Home/index',function(){
return view('LandingPage.Home.main_index');
});
Route::get('/store',[App\Http\Controllers\Store\StoreController::class,'index']);
Route::get('/store2',[App\Http\Controllers\Store\StoreController::class,'index2']);
Route::get('/all-products/{id}/{b_type}',[App\Http\Controllers\Store\StoreController::class,'productByCategory']);

Route::get('/product-details/{id}/{type}',[App\Http\Controllers\Store\StoreController::class,'detail']);


Route::get('/Home/index',function(){
    return view('LandingPage.Home.main_index');
    });
    
//  Login signup routes



//Admin pannel after Login Start

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('index');
    });
    Route::get('/store-dashboard', function () {
        return view('storeindex');
    });


Route::get('/deposit_now',function(){
    return view('modules.Cash_Deposit.index');
});


//// Spatie
Route::get('logout', [App\Http\Controllers\User\UserController::class, 'logout']);
Route::get('createrole', [App\Http\Controllers\User\UserRoleController::class, 'createRole']);
Route::get('createpermission', [App\Http\Controllers\User\UserRoleController::class, 'createPermission']);
Route::get('assignpermission', [App\Http\Controllers\User\UserRoleController::class, 'assignPermission']);
Route::POST('manage-permission', [App\Http\Controllers\User\UserRoleController::class, 'changePermission']);
Route::get('assignrole', [App\Http\Controllers\User\UserRoleController::class, 'assignRole']);


Route::get('/my-password', function () {
    return view('modules.Users.myPassword');
    });
Route::POST('user-password', [App\Http\Controllers\User\UserController::class,'userPassword']);
Route::POST('user-edit', [App\Http\Controllers\User\UserController::class,'editUser']);
Route::POST('update-user', [App\Http\Controllers\User\UserController::class,'updateUser']);
Route::POST('update-password', [App\Http\Controllers\User\UserController::class,'updatePassword']);
Route::POST('update-my-password', [App\Http\Controllers\User\UserController::class,'myPassword']);



/// RP Conversion
Route::resource('/Convert-to-rp',App\Http\Controllers\User\RpConversionHistoryController::class);


///All users 
Route::get('/users', [App\Http\Controllers\User\UserController::class, 'allUsers']);
Route::get('/unpaid-users', [App\Http\Controllers\User\UserController::class, 'allUnpaidUsers']);
Route::get('/paid-users', [App\Http\Controllers\User\UserController::class, 'allpaidUsers']);

Route::get('search-paid-users', [App\Http\Controllers\User\UserController::class , 'searchPaidUsers']);
Route::POSt('search-paid-users', [App\Http\Controllers\User\UserController::class , 'getSearchedPaid']);
Route::get('search-all-users', [App\Http\Controllers\User\UserController::class , 'searchAllUsers']);
Route::POSt('search-all-users', [App\Http\Controllers\User\UserController::class , 'getSearchedAll']);
Route::get('search-unpaid-users', [App\Http\Controllers\User\UserController::class , 'searchUnPaidUsers']);
Route::POSt('search-unpaid-users', [App\Http\Controllers\User\UserController::class , 'getSearchedUnPaid']);

Route::get('/users-cwallet', [App\Http\Controllers\User\UserController::class, 'allUsersCwallet']);
Route::get('/users-pv', [App\Http\Controllers\User\UserController::class, 'allUsersPv']);
Route::get('/users-cpv', [App\Http\Controllers\User\UserController::class, 'allUsersCpv']);
Route::get('/users-cbv', [App\Http\Controllers\User\UserController::class, 'allUsersCbv']);
Route::get('/users-pv-store', [App\Http\Controllers\User\UserController::class, 'allUsersPvStore']); /// Pv To add On store products
Route::get('/users-uni-q', [App\Http\Controllers\User\UserController::class, 'allUsersUniQ']);
Route::get('/users-auto-q', [App\Http\Controllers\User\UserController::class, 'allUsersAutoQ']);
Route::get('/users-dp', [App\Http\Controllers\User\UserController::class, 'allUsersDp']);
Route::get('/users-affiliate', [App\Http\Controllers\User\UserController::class, 'allUsersAffiliate']);
Route::get('/users-rp', [App\Http\Controllers\User\UserController::class, 'allUsersRp']);
Route::get('/users-store', [App\Http\Controllers\User\UserController::class, 'allUsersStore']);
Route::get('/users-rank-achievers', [App\Http\Controllers\User\UserController::class, 'usersRankAchievers']);
Route::get('/all-users-pairs', [App\Http\Controllers\User\UserController::class, 'usersPairPoints']);

Route::POST('/getUserDetail', [App\Http\Controllers\User\UserController::class, 'getUserDetail']);

Route::POST('/deactivate_user', [App\Http\Controllers\User\UserController::class, 'deactivateUser']);
Route::POST('/activate_user', [App\Http\Controllers\User\UserController::class, 'activateUser']);
Route::POST('/delete_user', [App\Http\Controllers\User\UserController::class, 'deleteUser']);
// ....stats...
Route::POST('/premium-user', [App\Http\Controllers\User\UserController::class, 'premiumUser']);
Route::get('/stats', [App\Http\Controllers\User\StatsController::class, 'index']);
// Unilevel
Route::resource('/unilevel-settings', App\Http\Controllers\UnilevelController::class);
Route::get('/unilevel-income', [App\Http\Controllers\UnilevelController::class, 'income']);
Route::get('/convert-pv', [App\Http\Controllers\UnilevelController::class, 'convertPv']);
Route::POST('/get-unilevel-team', [App\Http\Controllers\UnilevelController::class, 'getUnilevelTeam']);
Route::POST('/unilevel-network-summary', [App\Http\Controllers\UnilevelController::class, 'networkSummary']);


// Affiliate Plan 
Route::resource('/affiliate-settings', App\Http\Controllers\AffiliateController::class);
Route::get('/affiliate-income', [App\Http\Controllers\AffiliateController::class, 'income']);
Route::POST('/affiliate-transfer', [App\Http\Controllers\AffiliateController::class, 'transfer']);

Route::POST('/get-affiliate-team', [App\Http\Controllers\AffiliateController::class, 'getTeam']);
Route::POST('/affiliate-network-summary', [App\Http\Controllers\AffiliateController::class, 'networkSummary']);





// important links
Route::get('/important_links',function(){
    return view('modules.Important_Links.index');
});


Route::get('/shop-now',[App\Http\Controllers\Store\StoreController::class,'shopNow']); 
// Products
Route::resource('/posters', App\Http\Controllers\PosterController::class);
Route::resource('/products', App\Http\Controllers\Store\ProductController::class);
Route::get('/product-cats', [App\Http\Controllers\Store\ProductController::class,'productCats']);
Route::resource('/digital_cources', App\Http\Controllers\Store\DigitalProductController::class);
Route::get('/cource-cats', [App\Http\Controllers\Store\DigitalProductController::class,'productCats']);
Route::resource('/digital_library', App\Http\Controllers\Store\DigitalLibraryController::class);
Route::get('/library-cats', [App\Http\Controllers\Store\DigitalLibraryController::class,'productCats']);
// Category
Route::resource('/categories', App\Http\Controllers\Store\CategoryController::class);
Route::resource('/cource_categories', App\Http\Controllers\Store\CourceCategoryController::class);
Route::resource('/library_categories', App\Http\Controllers\Store\LibraryCategoryController::class);
// Sub Category
Route::resource('/sub-categories', App\Http\Controllers\Store\SubCategoryController::class);
Route::POST('/get-sub-categories', [App\Http\Controllers\Store\SubCategoryController::class, 'getSubCategories']);
// Sizes


/// gallary
    
    // web.php
    // Route::get('/gallery', [App\Http\Controllers\GalleryController::class,'index'])->name('gallery.index');
    // Route::post('/gallery', [App\Http\Controllers\GalleryController::class,'store'])->name('gallery.store');
    Route::resource('/gallery', App\Http\Controllers\GalleryController::class);
    Route::post('/gallery/select', [App\Http\Controllers\GalleryController::class,'select'])->name('gallery.select');

// Bv Log

Route::resource('/bv_log',App\Http\Controllers\User\BvLogController ::class); 
Route::get('/bv_log_history',[App\Http\Controllers\User\BvLogController ::class,'bvLogs']); 
Route::get('/cbv_log',[App\Http\Controllers\User\BvLogController ::class,'cbvLogs']); 
Route::POST('/store-to-bv',[App\Http\Controllers\User\BvLogController ::class,'StoreToBv']); 
//Referrals

Route::get('/referrals', [App\Http\Controllers\User\UserController::class, 'myReferrals']);
Route::POST('/referral_tree', [App\Http\Controllers\User\UserController::class, 'myReferral_tree']);
//Network SUmmary
Route::POST('/network', [App\Http\Controllers\User\UserController::class, 'networkSummary']);

Route::POST('/networkSummaryRefrals', [App\Http\Controllers\User\UserController::class, 'networkSummaryRefrals']);
//Balance Transfer
Route::get('/transfer', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransfer']);
Route::get('/pv-store-transfer', [App\Http\Controllers\Admin\TransferPointController::class, 'PvStoreTransfer']);
Route::get('/balance-sent', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceSent']);
Route::get('/balance-recieved', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceRecieved']);
Route::resource('transfer-points',App\Http\Controllers\Admin\TransferPointController::class);


Route::get('/c-wallet-commission', [App\Http\Controllers\User\PairPointController::class, 'cWallet']);
Route::get('/future-point-commission', [App\Http\Controllers\User\PairPointController::class, 'futurePoint']);



Route::get('/transfer-c_wallet', [App\Http\Controllers\Admin\CwalletController::class, 'BalanceTransferCwallet']);
Route::get('/transfer-admin-rp', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferRP']);
Route::get('/transfer-admin-dp', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferDP']);
Route::get('/transfer-affiliate-points', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferAffiliate']);
Route::get('/transfer-admin-bv', [App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferBV']);
Route::get('/transfer-admin-cbv',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferCBV']);
Route::get('/transfer-admin-future',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferFuture']);
Route::get('/transfer-admin-store',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferStore']);
Route::get('/transfer-admin-store-bv',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferStoreBv']);
Route::get('/transfer-admin-affiliate-pv',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferAffiliatePv']);
Route::get('/transfer-store-pv-wallet',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferStorePvWallet']);
Route::get('/transfer-admin-cpv',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferCpv']);
Route::get('/transfer-admin-earning',[App\Http\Controllers\Admin\TransferPointController::class, 'BalanceTransferTotalEarning']);
Route::resource('c-wallet',App\Http\Controllers\Admin\CwalletController::class);






//Withdraw

// Route::get('/withdraw_now',function(){
//     return view('modules.withdraw.index');
// });

Route::resource('/withdraw',App\Http\Controllers\Admin\WithdrawTransactionsController ::class); 
Route::GET('/withdraw-transactions', [App\Http\Controllers\Admin\WithdrawTransactionsController::class , 'Transactions']);
Route::GET('/withdraw-transactions-h', [App\Http\Controllers\Admin\WithdrawTransactionsController::class , 'TransactionsHistory']);

Route::POST('/approve_withdraw', [ App\Http\Controllers\Admin\WithdrawTransactionsController::class,'approve_transaction']);
Route::POST('/cancell_withdraw', [ App\Http\Controllers\Admin\WithdrawTransactionsController::class,'cancell_transaction']);

//complaint
Route::resource('/complaint', App\Http\Controllers\Admin\ComplaintsController::class);
Route::POST('delete_complaint', [App\Http\Controllers\Admin\ComplaintsController::class, 'deleteComplaint']);
Route::POST('/approve_complaint', [ App\Http\Controllers\Admin\ComplaintsController::class,'approveComplaint']);
Route::POST('/cancell_complaint', [ App\Http\Controllers\Admin\ComplaintsController::class,'cancellComplaint']);
Route::get('create_complaint', [App\Http\Controllers\Admin\ComplaintsController::class, 'create']);


//Ticket support

ROute::get('/ticket',function(){
    return view('modules.Ticket_Support.index');
});

//User Profile

//Trasaction
Route::resource('/transactions', App\Http\Controllers\User\TransactionsController::class);
Route::POST('/approve_deposit', [ App\Http\Controllers\User\TransactionsController::class,'approve_transaction']);
Route::POST('/cancell_deposit', [ App\Http\Controllers\User\TransactionsController::class,'cancell_transaction']);
Route::resource('/User', App\Http\Controllers\User\UserController::class);
Route::GET('/user-profile', [App\Http\Controllers\User\UserController::class , 'UserProfile']);
Route::POST('/user-show', [App\Http\Controllers\User\UserController::class , 'UserShow']);
Route::POST('/drawTree', [App\Http\Controllers\User\UserController::class , 'drawTree']);
Route::get('/user-ranks',[App\Http\Controllers\User\UserController::class, 'getUserRank']);
Route::POST('/update-user-rank', [App\Http\Controllers\User\UserController::class , 'updateUserRank']);





//login history

Route::get('/login-history',[App\Http\Controllers\Admin\LoginHistoryController::class, 'LoginHistory']);
Route::POST('/DeleteLoginHistory', [App\Http\Controllers\Admin\LoginHistoryController::class, 'DeleteLoginHistory']);

//Transactions History
Route::get('/transactions_history',[App\Http\Controllers\User\TransactionsController::class, 'TransactionHistory']);
Route::POST('/DeleteTransactionHistory', [App\Http\Controllers\User\TransactionsController::class, 'DeleteTransactionHistory']);


//Withdraw History


//First Commission
Route::get('/first_Commission',function(){
    return view('modules.Reports.First_Commission');
});

//Withdraw Transaction History

Route::get('/withdraw-history',[App\Http\Controllers\Admin\WithdrawTransactionsController::class, 'WithdrawHistory']);
Route::POST('/DeleteWithdrawTransactionHistory', [App\Http\Controllers\Admin\WithdrawTransactionsController::class, 'DeleteWithdrawTransactionHistory']);
//Buy History
Route::get('/convert-bv', [App\Http\Controllers\Admin\DashboardController::class, 'convertBv']);
Route::get('/b2b-pool-reset', [App\Http\Controllers\Admin\DashboardController::class, 'b2bPoolReset']);
Route::get('/b2c-pool-reset', [App\Http\Controllers\Admin\DashboardController::class, 'b2cPoolReset']);
Route::get('/Buy_History',function(){
    return view('modules.Reports.Buy_History');
});

//Bonus2 Commission

Route::get('/Bonus2_Commission',function(){
    return view('modules.Reports.Bonus2_Commission');
});

/// Account Details 
Route::get('/deposit_accounts',function(){
    return view('modules.AccountDetails.show');
});
Route::resource('/account-details', App\Http\Controllers\Admin\AdminAccountDetailsController::class);
// Account Details

//kyc
Route::post('search-permission', [App\Http\Controllers\User\UserRoleController::class , 'searchPermissions']);
Route::post('manage-permission', [App\Http\Controllers\User\UserRoleController::class , 'allPermissions']);
Route::post('change-user-permission', [App\Http\Controllers\User\UserRoleController::class , 'changePermissionLive']);

//////// Orser system

// routes/web.php

Route::POST('/create-order', 'App\Http\Controllers\OrderController@createOrder');
Route::post('/add-to-cart', 'App\Http\Controllers\OrderController@addToCart');
Route::get('/view-cart', 'App\Http\Controllers\OrderController@viewCart');
Route::get('/cancell-order', 'App\Http\Controllers\OrderController@emptyCart');
Route::POST('/approve-order-status', [App\Http\Controllers\OrderController::class, 'approveOrder']);
Route::POST('/cancell-order-status', [App\Http\Controllers\OrderController::class, 'cancellOrder']);
Route::post('/remove-from-cart', 'App\Http\Controllers\OrderController@removeFromCart');


Route::GET('/orders', 'App\Http\Controllers\OrderController@adminOrders');
Route::GET('/cust-orders', 'App\Http\Controllers\OrderController@customerOrders');
Route::POST('/order-details', 'App\Http\Controllers\OrderController@adminOrderDetails');

Route::get('/KYC', [App\Http\Controllers\User\UserKycController::class, 'myKyc']);
Route::POST('/show-kyc', [App\Http\Controllers\User\UserKycController::class, 'showKyc']);
Route::POST('/approve-kyc', [App\Http\Controllers\User\UserKycController::class, 'approveKyc']);
Route::POST('/cancell-kyc', [App\Http\Controllers\User\UserKycController::class, 'cancellKyc']);
Route::POST('/pending-kyc', [App\Http\Controllers\User\UserKycController::class, 'pendingKyc']);
Route::resource('/user_kyc', App\Http\Controllers\User\UserKycController::class);

});

Route::get('/paid-users/pdf', [App\Http\Controllers\User\UserController::class, 'createPDF']);

Route::resource('/packages', App\Http\Controllers\User\PackagesController::class);
Route::GET('/all-packages',[App\Http\Controllers\User\PackagesController::class,'indexPackages']);
Route::POST('/edit-package',[App\Http\Controllers\User\PackagesController::class,'edit']);
Route::POST('/get-package',[App\Http\Controllers\User\PackagesController::class,'getPackage']);
Route::POST('/update-package',[App\Http\Controllers\User\PackagesController::class,'update']);
Route::POST('/package-update',[App\Http\Controllers\User\PackagesController::class,'packageUpdate']);
Route::POST('/update-plan',[App\Http\Controllers\User\PurchasedPlanController::class,'updatePlan']);
Route::resource('/purchased-plans', App\Http\Controllers\User\PurchasedPlanController::class);
Route::get('/users_packages', [App\Http\Controllers\User\PurchasedPlanController::class, 'allPackages']);

///packages
