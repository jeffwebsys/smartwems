<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTicket;
use App\Jobs\SendEmailJob;

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
Route::get('/email', function () {

	Mail::to('darksil3nt17@gmail.com')->send(new SendTicket());

    return new SendTicket();
});

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'ProfileController@myprofile')->name('myprofile');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// MEDIA
  

   


// Administrator
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['App\Http\Middleware\Administrator','auth'/*,'verified'*/]], function(){

	$dir = 'Administrator';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'Administrator';
	$controller = $dir . '\MainController';

	Route::get('/users', $controller.'@users')->name('users');
	Route::get('/users/{id}/edit', $controller.'@edit')->name('edit.users');
	Route::post('/users/store', $controller.'@store')->name('users.store');
	Route::delete('/users/store/{id}', $controller.'@destroy')->name('users.destroy');

	Route::get('/settings', $controller.'@settings')->name('settings');
	Route::post('/settings/store', $controller.'@settingsStore')->name('settingsStore');

	Route::get('/equipment', $controller.'@equipment')->name('equipment');
	Route::get('/equipmentview/{id}', $controller.'@equipmentView')->name('equipmentView');
	
});

// Supervisor
Route::group(['prefix' => 'supervisor', 'as' => 'supervisor.', 'middleware' => ['App\Http\Middleware\Supervisor','auth'/*,'verified'*/]], function(){

	$dir = 'Supervisor';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'Supervisor';
	$controller = $dir . '\MainController';

	Route::get('/stafflist', $controller.'@stafflist')->name('stafflist');
	Route::get('/stafflist/{id}/edit', $controller.'@edit')->name('stafflist.edit');
	Route::post('/stafflist/store', $controller.'@store')->name('stafflist.store');
	Route::delete('/stafflist/store/{id}', $controller.'@destroy')->name('stafflist.destroy');

	Route::get('/notify', $controller.'@notify')->name('notify');

	Route::post('/notfiy/store', $controller.'@notifyStore')->name('notify.store');
	Route::post('/ticket/update', $controller.'@ticketUpdate')->name('notify.ticketUpdate');

	Route::get('/assets', $controller.'@assets')->name('assets');
	Route::post('/assets/report', $controller.'@assetsStore')->name('assetsStore');

	Route::post('/print/report', $controller.'@printReport')->name('printReport');
	
});

// Maintenance Staff
Route::group(['prefix' => 'maintenancestaff', 'as' => 'maintenancestaff.', 'middleware' => ['App\Http\Middleware\MaintenanceStaff','auth'/*,'verified'*/]], function(){

	$dir = 'MaintenanceStaff';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'MaintenanceStaff';
	$controller = $dir . '\MainController';

	Route::get('/pending', $controller.'@pending')->name('pending');
	Route::get('/pending/{id}/edit', $controller.'@edit')->name('pending.edit');
	Route::post('/pending/store', $controller.'@store')->name('pending.store');
	Route::delete('/pending/store/{id}', $controller.'@destroy')->name('pending.destroy');

	Route::get('/completed', $controller.'@completed')->name('completed');
	// Route::get('/completed/{id}/edit', $controller.'@edit')->name('completed.edit');
	// Route::post('/completed/store', $controller.'@store')->name('completed.store');
	// Route::delete('/completed/store/{id}', $controller.'@destroy')->name('completed.destroy');

	Route::get('/procurement', $controller.'@procurement')->name('procurement');
	Route::get('/procurement/{id}/edit', $controller.'@getProcurement')->name('procurement.edit');
	Route::post('/procurement/store', $controller.'@procurementStore')->name('procurement.store');

	Route::get('/inventory', $controller.'@inventory')->name('inventory');

	Route::get('/history/{id}/view', $controller.'@history')->name('history');
	
});

// Staff
Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => ['App\Http\Middleware\Staff','auth'/*,'verified'*/]], function(){

	$dir = 'Staff';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'Staff';
	$controller = $dir . '\MainController';

	Route::get('/servicelist', $controller.'@servicelist')->name('servicelist');
	Route::get('/servicelist/{id}/edit', $controller.'@edit')->name('servicelist.edit');
	Route::post('/servicelist/store', $controller.'@store')->name('servicelist.store');
	Route::delete('/servicelist/store/{id}', $controller.'@destroy')->name('servicelist.destroy');

	Route::get('/servicelist/autocomplete', $controller.'@autocomplete')->name('servicelist.autocomplete');
	Route::post('/servicelist/openticket', $controller.'@openticket')->name('servicelist.openticket');

	Route::get('/equipment', $controller.'@equipment')->name('equipment');
	Route::get('/equipmentview/{id}', $controller.'@equipmentView')->name('equipmentView');
	Route::post('/ticket/store', $controller.'@submitTicket')->name('submitTicket');
	Route::post('/print/pdf', $controller.'@printPdf')->name('printPdf');

	Route::get('/track', $controller.'@track')->name('track');
	Route::post('/track/store', $controller.'@trackStore')->name('trackStore');

	Route::get('/history/{id}/view', $controller.'@history')->name('history');
});

// Supply Officer
Route::group(['prefix' => 'supplyofficer', 'as' => 'supplyofficer.', 'middleware' => ['App\Http\Middleware\SupplyOfficer','auth'/*,'verified'*/]], function(){

	$dir = 'SupplyOfficer';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'SupplyOfficer';
	$controller = $dir . '\MainController';

	Route::get('/equipment', $controller.'@equipment')->name('equipment');
	Route::get('/equipment/{id}/edit', $controller.'@edit')->name('equipment.edit');
	Route::post('/equipment/store', $controller.'@store')->name('equipment.store');
	Route::put('/equipment/{id}/update', $controller.'@update')->name('equipment.update');
	Route::delete('/equipment/store/{id}', $controller.'@destroy')->name('equipment.destroy');

	Route::get('/procurement', $controller.'@procurement')->name('procurement');
	Route::get('/procurement/{id}/edit', $controller.'@procurementEdit')->name('procurement.edit');
	Route::post('/procurement/store', $controller.'@procurementStore')->name('procurement.store');

	Route::get('/reports', $controller.'@reports')->name('reports');
	Route::get('/equipmentview/{id}', $controller.'@equipmentView')->name('equipmentView');
	Route::post('/print/pdf', $controller.'@printPdf')->name('printPdf');

	Route::post('/printqr/qr', $controller.'@printQr')->name('printQr');

	Route::get('/assets', $controller.'@assets')->name('assets');
	Route::post('/assets/report', $controller.'@assetsStore')->name('assetsStore');

	Route::post('/print/report', $controller.'@printReport')->name('printReport');

	Route::get('f/{filename}', 'MediaController@supplyOfficer')->name('media.supplyofficer');
	
});

// Supplier
Route::group(['prefix' => 'supplier', 'as' => 'supplier.', 'middleware' => ['App\Http\Middleware\Supplier','auth'/*,'verified'*/]], function(){

	$dir = 'Supplier';
	$controller = $dir . '\AccountController';

	Route::get('/account', $controller.'@index')->name('account');

	$dir = 'Supplier';
	$controller = $dir . '\MainController';

	Route::get('/procurement', $controller.'@procurement')->name('procurement');
	Route::get('/procurement/{id}/edit', $controller.'@edit')->name('procurement.edit');
	Route::post('/procurement/store', $controller.'@store')->name('procurement.store');
	Route::put('/procurement/{id}/update', $controller.'@update')->name('procurement.update');
	Route::delete('/procurement/store/{id}', $controller.'@destroy')->name('procurement.destroy');

	Route::get('/servicerequest', $controller.'@servticket')->name('servicerequest');
	Route::get('/servicerequest/{id}/edit', $controller.'@edit')->name('servicerequest.edit');
	Route::post('/servicerequest/store', $controller.'@store')->name('servicerequest.store');

	Route::get('/supplyreport/{id}/log', $controller.'@supplyReport')->name('supplyReport');

	Route::post('/file/store', $controller.'@fileStore')->name('file.store');

	Route::get('f/{filename}', 'MediaController@supplierFile')->name('media.supplier');

	Route::get('/history/{id}/view', $controller.'@history')->name('history');
	
});