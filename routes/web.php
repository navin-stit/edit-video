<?php

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
#Auth controller
Route::get('activate/{token}', 'Auth\RegisterController@activate')->name('activate');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
#SubscribeMember Controller
Route::get('/get-started', 'SubscribeMemberController@subscribememberlist')->name("subscribe.subscribememberlist");
Route::get('/faq', 'Customer\CustomerController@faq')->name("faq");
#Admin Controller
//datatable
Route::get('datatables', 'Admin\AdminController@getAllQPRUPloaded')->name('datatables');
//dashboard
Route::get('admin/dashboard', 'Admin\AdminController@dashboard')->name('admin/dashboard');
Route::get('admin/employee-details', 'Admin\AdminController@adminDashboard')->name('admin/employee-details');
Route::post('addEmployee', 'Admin\AdminController@addEmployee');
Route::delete('removeEmployee', 'Admin\AdminController@removeEmployee');
Route::post('updateEmp', 'Admin\AdminController@editEmployee');
Route::post('updateEmpData', 'Admin\AdminController@updateEmp');

#Employee Controller
Route::get('employee/dashboard', 'Employee\EmployeeController@dashboard')->name('employee/dashboard');
Route::any('employee/orders', 'Employee\EmployeeController@viewOrders')->name('employee/orders');
Route::get('employee/viewOrderDetails/{id}', 'Employee\EmployeeController@viewOrderByEmp')->name('employee/viewOrderDetails');
Route::post('assidnedOrder', 'Employee\EmployeeController@assignedOrderByEmp');
Route::post('rejectOrder', 'Employee\EmployeeController@rejectOrderByEmp');
Route::post('proceedOrder', 'Employee\EmployeeController@proceedOrderByEmp');
Route::post('addVideo', 'Employee\EmployeeController@videoUploadByEmp');

//Customer Controller
Route::get('/customer/dashboard',"Customer\CustomerController@customerlist")->name('customer.dashboard');
Route::get('/customerprofile/{id}',"CustomerController@customerprofile")->name("customer.customerprofile");
Route::get('create-video', 'Customer\CustomerController@viewCreateVideos')->name('create-video');
Route::get('create-video/{id?}', 'Customer\CustomerController@viewCreateVideos')->name('create-video}');
Route::post('storeCustomerData', 'Customer\CustomerController@storeFirstPageData');
Route::get('select-video', 'Customer\CustomerController@selectVideo')->name('select-video');
Route::get('select-video/{id?}', 'Customer\CustomerController@selectVideo')->name('select-video');
Route::post('storeSelectVideoData', 'Customer\CustomerController@storeSelectVideoData');
Route::post('saveImage', 'Customer\CustomerController@custOrderLogo')->name('save.logo');
Route::post('saveMusic', 'Customer\CustomerController@custOrderMusic')->name('save.music');
Route::post('bakToCreateVideo', 'Customer\CustomerController@bakToCreateVideo');
Route::get('video-variations/{id}', 'Customer\CustomerController@customerVideoVariation')->name('video-variations/{id}');
Route::get('video-variations', 'Customer\CustomerController@customerVideoVariation')->name('video-variations/{id}');
Route::post('storeSubscribePlan','Customer\CustomerController@subscribeMember');
Route::post('storeUnSubscribePlan','Customer\CustomerController@UnsubscribeMember');

#PayPalController
Route::get('/paypal/{order?}','PayPalController@form')->name('order.paypal');
Route::post('/checkout/payment/{order}/paypal','PayPalController@checkout')->name('checkout.payment.paypal');
Route::get('/paypal/checkout/{order}/completed','PayPalController@completed')->name('paypal.checkout.completed');
Route::get('/paypal/checkout/{order}/cancelled','PayPalController@cancelled')->name('paypal.checkout.cancelled');
Route::post('/webhook/paypal/{order?}/{env?}','PayPalController@webhook')->name('webhook.paypal.ipn');
Route::get('payment-completed/{order}','PayPalController@paymentCompleted')->name('paymentCompleted');

#Recuring Controller
Route::get('/recuring', 'RecuringPaymentController@getIndex');
Route::get('/eccheckout', 'RecuringPaymentController@getExpressCheckout')->name('paypal.eccheckout');
Route::get('paypal/ec-checkout-success', 'RecuringPaymentController@getExpressCheckoutSuccess');
Route::get('paypal/adaptive-pay', 'RecuringPaymentController@getAdaptivePay');
Route::post('paypal/notify', 'RecuringPaymentController@notify');

#CustomerDownloadVideo
Route::get('video/download/{id}','Customer\CustomerController@downloadvideo')->name('video.download');
Route::post('/addCusComm', 'Customer\CustomerController@addCustomerComment');

