<?php

use App\Http\Controllers\UserController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
//use Session;
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
   
})->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/help', function () {
    return view('help');
});

Route::post('/login', 'UserController@login')->name('userlogin');

Route::get('/logout', 'UserController@logout')->name('logout')->middleware('checktoken');

Route::get('/forgot_password', function () {
    return view('forgot_password');
})->name('forgot_password');

Route::post('/reset_password_first', 'UserController@ResetPasswordFirst')->name('reset_password_first');

Route::get('/reset_password', function () {
    return view('reset_password');
})->name('reset_password');

Route::post('/reset_password_sec', 'UserController@ResetPasswordSec')->name('reset_password_sec');

// Route::resource('albums', 'AlbumController');
// Route::resource('albums.photo', 'PhotoController');
// Route::resource('testimonials', 'TestimonialsController');

Route::resource('bookings', 'BookingController')->except('index')->middleware('checktoken');

Route::get('booking_list/{page?}','BookingController@index')->name('booking.index')->middleware('checktoken');


Route::resource('adminbookings', 'AdminbookingController')->except('index')->middleware('checktoken');

Route::get('adminbooking_list/{page?}','AdminbookingController@index')->name('adminbookings.index')->middleware('checktoken');
Route::get('user_payment/{upid}/edit','AdminbookingController@userpym')->name('user_payment.edit')->middleware('checktoken');
Route::put('user_payment/{userpym}','AdminbookingController@update_user_pym')->name('user_payment.update')->middleware('checktoken');



Route::get('getprodroom/{id}','AdminbookingController@getprodrooms')->name('getprodrooms')->middleware('checktoken');

Route::get('getrooms/{id}','AdminbookingController@getrooms')->name('getrooms')->middleware('checktoken');

Route::resource('status', 'StatusController')->except('index')->middleware('checktoken');

Route::get('status_list/{page?}','StatusController@index')->name('status.index')->middleware('checktoken');

Route::resource('property', 'PropertyController')->except('index')->middleware('checktoken');

Route::get('property_list/{page?}','PropertyController@index')->name('property.index')->middleware('checktoken');



Route::resource('host', 'HosttypeController')->except('index')->middleware('checktoken');

Route::get('host_list/{page?}','HosttypeController@index')->name('host.index')->middleware('checktoken');

Route::resource('policies', 'PoliciesController')->except('index')->middleware('checktoken');

Route::get('property_policies_list/{page?}','PoliciesController@propertyList')->name('property_policies_list')->middleware('checktoken');

Route::get('policy_list/{property}','PoliciesController@policyList')->name('policy_list')->middleware('checktoken');

Route::resource('properties', 'PropertiesController')->except('index')->middleware('checktoken');

Route::get('properties_list/{page?}','PropertiesController@index')->name('properties.index')->middleware('checktoken');




Route::resource('reward', 'RewardController')->except('index')->middleware('checktoken');

Route::get('reward_list/{page?}','RewardController@index')->name('reward.index')->middleware('checktoken');



Route::resource('overallreview', 'OverallreviewController')->except('index')->middleware('checktoken');

Route::get('overallreview_list/{page?}','OverallreviewController@index')->name('overallreview.index')->middleware('checktoken');



Route::resource('highlight', 'HighlightController')->except('index')->middleware('checktoken');

Route::get('highlight_list/{page?}','HighlightController@index')->name('highlight.index')->middleware('checktoken');



Route::resource('charity', 'CharityController')->except('index')->middleware('checktoken');

Route::get('charity_list/{page?}','CharityController@index')->name('charity.index')->middleware('checktoken');



Route::resource('ecoarea', 'EcoareaController')->except('index')->middleware('checktoken');

Route::get('ecoarea_list/{page?}','EcoareaController@index')->name('ecoarea.index')->middleware('checktoken');




Route::resource('ecoreward', 'EcorewardController')->except('index')->middleware('checktoken');

Route::get('eco_reward_list/{page?}','EcorewardController@index')->name('ecoreward.index')->middleware('checktoken');


Route::post('edit_ecoarea', 'EcoareaController@neweco')->name('edit_ecoarea')->middleware('checktoken');


Route::resource('config_policies', 'ConfigpoliciesController')->except('index')->middleware('checktoken');

Route::get('config_policies_list/{page?}','ConfigpoliciesController@index')->name('config_policies.index')->middleware('checktoken');

Route::put('store_policies','PoliciesController@newpolicies')->name('store_policies')->middleware('checktoken');

Route::get('store_policies/{page?}','PoliciesController@policycreate')->name('store_policies')->middleware('checktoken');

Route::post('store_policies','PoliciesController@policystore')->name('store_policies')->middleware('checktoken');

// Route::post('policies/create}','PropertiesController@createpolicies')->name('policies.create')->middleware('checktoken');

// Route::post('prooms/create}','PropertiesController@createrooms')->name('prooms.create')->middleware('checktoken');
Route::get('user_reward/{pid}/{id}/edit','EcorewardController@userreward')->name('user_reward')->middleware('checktoken');

Route::put('user_reward/{rewards}','EcorewardController@newreward')->name('user_reward.update')->middleware('checktoken');


Route::resource('tax', 'TaxController')->except('index')->middleware('checktoken');

Route::get('tax_list/{page?}','TaxController@index')->name('tax.index')->middleware('checktoken');



Route::resource('roomtype', 'BookingroomController')->except('index')->middleware('checktoken');

Route::get('booking_room_list/{page?}','BookingroomController@index')->name('roomtype.index')->middleware('checktoken');


Route::resource('booksts', 'BookingstatusController')->except('index')->middleware('checktoken');

Route::get('booking_status_list/{page?}','BookingstatusController@index')->name('booksts.index')->middleware('checktoken');



Route::resource('amenity', 'AmenitiesController')->except('index')->middleware('checktoken');

Route::get('amenity_list/{page?}','AmenitiesController@index')->name('amenity.index')->middleware('checktoken');


Route::resource('payment', 'PaymentController')->except('index')->middleware('checktoken');

Route::get('payment_list/{page?}','PaymentController@index')->name('payment.index')->middleware('checktoken');

Route::resource('profile', 'ProfileController')->except('index')->middleware('checktoken');

Route::get('show_profile/{page?}','ProfileController@index')->name('profile.index')->middleware('checktoken');

// Route::put('update_password', 'ProfileController@updatepassword')->name('update_password')->middleware('checktoken');

// Route::get('change_password','ProfileController@passwordedit')->name('change_password.index')->middleware('checktoken');


Route::resource('users', 'UserController')->except('index')->middleware('checktoken');

Route::get('user_list/{page?}','UserController@index')->name('user.index')->middleware('checktoken');



Route::resource('roles', 'RoleController')->except('index')->middleware('checktoken');

Route::get('role_list/{page?}','RoleController@index')->name('role.index')->middleware('checktoken');


Route::resource('permissions', 'PermissionController')->except('index')->middleware('checktoken');

Route::get('permission_list/{page?}','PermissionController@index')->name('permission.index')->middleware('checktoken');



Route::resource('settings', 'SettingsController')->except('index')->middleware('checktoken');



Route::post('assets/storeimage/{module}/{id}', 'AssetsController@store')->name('assets.storeimage')->middleware('checktoken');

Route::resource('assets', 'AssetsController')->except('store')->middleware('checktoken');



Route::get('{slug?}/{id}/edit/assets','AssetsController@editimage')->name('assets.edit')->middleware('checktoken');



Route::resource('commission', 'CommissionController')->except('index')->middleware('checktoken');

Route::get('commission_list/{page?}','CommissionController@index')->name('commission.index')->middleware('checktoken');


Route::resource('rooms', 'RoomController')->except('index')->middleware('checktoken');

Route::get('rooms_list/{page?}','RoomController@index')->name('rooms.index')->middleware('checktoken');


Route::resource('profile', 'ProfileController')->except('index')->middleware('checktoken');

Route::get('show_profile/{page?}','ProfileController@index')->name('profile.index')->middleware('checktoken');



Route::put('update_password', 'ProfileController@updatepassword')->name('update_password')->middleware('checktoken');

Route::get('change_password','ProfileController@passwordedit')->name('change_password.index')->middleware('checktoken');




Route::resource('coolthing', 'CoolthingController')->except('index')->middleware('checktoken');

Route::get('coolthing_list/{page?}','CoolthingController@index')->name('coolthing.index')->middleware('checktoken');


Route::resource('centralsystem', 'CentralsystemController')->except('index')->middleware('checktoken');

Route::get('central_system_list/{page?}','CentralsystemController@index')->name('centralsystem.index')->middleware('checktoken');


Route::resource('property_management', 'PropertymanagementController')->except('index')->middleware('checktoken');

Route::get('property_management_list/{page?}','PropertymanagementController@index')->name('property_management.index')->middleware('checktoken');


Route::resource('review', 'ReviewController')->except('index')->middleware('checktoken');

Route::get('review_list/{page?}','ReviewController@index')->name('review.index')->middleware('checktoken');


Route::get('admin_invoice_list/{page?}','InvoiceController@getAdminInvoice')->name('admin.invoice')->middleware('checktoken');
// newly added column on 04.03.2021
Route::get('admin_settlement_list/{page?}','InvoiceController@getAdminsettlement')->name('admin.settlement')->middleware('checktoken');
// end of newly added column

Route::get('vendor_invoice_list/{page?}','InvoiceController@getVendorInvoice')->name('vendor.invoice')->middleware('checktoken');

Route::get('charity_invoice_list/{page?}','InvoiceController@getCharityInvoice')->name('charity.invoice')->middleware('checktoken');

Route::get('admin_monthly_invoice_list/{page?}/{property_id}/{year}','InvoiceController@getAdminMonthlyInvoice')->name('admin.monthlyinvoice')->middleware('checktoken');

Route::post('admin_monthly_invoice_create','InvoiceController@createAdminMonthlyInvoice')->name('admin.monthlyinvoice.create')->middleware('checktoken');
// newly added column on 04.03.2021
Route::post('admin_charity_settlement_create','InvoiceController@createcharitysettelement')->name('admin.charitysettlement.create')->middleware('checktoken');

Route::get('charity_settlement_list/{page?}/{conf_charity_id}/{year}','InvoiceController@getsettlement')->name('admin.monthlysettlement')->middleware('checktoken');
// end of newly added column

Route::get('charity_monthly_invoice_list/{page?}/{property_id}/{year}','InvoiceController@getAdminCharityInvoice')->name('charity.monthlyinvoice')->middleware('checktoken');

Route::post('charity_monthly_invoice_create','InvoiceController@createCharityMonthlyInvoice')->name('charity.monthlyinvoice.create')->middleware('checktoken');

Route::get('admin_monthly_invoice_details/{page?}/{vendor_invoice_id}','InvoiceController@getAdminMonthlyInvoiceDetails')->name('admin.monthlyinvoicedetail')->middleware('checktoken');

Route::get('user_payment_list/{page?}','UserPaymentController@index')->name('userpayment.index')->middleware('checktoken');

Route::get('getuser', function () {
    return 1;
});

