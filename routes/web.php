<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Ruta para los permisos de usuarios


//Rutas para los pacientes
Route::get('patients', 'App\Http\Controllers\PatientController@index')->name('patients.index');
Route::get('patients/create', 'App\Http\Controllers\PatientController@create')->name('patients.create');
Route::post('patients', 'App\Http\Controllers\PatientController@store');
Route::get('patients/tables', 'App\Http\Controllers\PatientController@tables');
Route::get('patients/document', 'App\Http\Controllers\PatientController@document');

//Rutas para los odontólogos
Route::get('dentist', 'App\Http\Controllers\DentistController@index')->name('dentist.index');
Route::get('dentist/create', 'App\Http\Controllers\DentistController@create')->name('dentist.create');
Route::post('dentist', 'App\Http\Controllers\DentistController@store');
Route::get('dentist/tables', 'App\Http\Controllers\DentistController@tables');

//Rutas para las citas
Route::get('citas/create', 'App\Http\Controllers\AppointmentController@create')->name('citas.create');
Route::get('citas', 'App\Http\Controllers\AppointmentController@index')->name('citas.index');
Route::post('citas', 'App\Http\Controllers\AppointmentController@store');
Route::get('citas/tables', 'App\Http\Controllers\AppointmentController@tables');

//Rutas para los pagos
Route::get('documents', 'App\Http\Controllers\DocumentController@index')->name('documents.index');
Route::get('documents/create', 'App\Http\Controllers\DocumentController@create')->name('documents.create');
Route::post('documents', 'App\Http\Controllers\DocumentController@store');
Route::get('documents/tables', 'App\Http\Controllers\DocumentController@tables');

//Rutas para ordenes de pago
Route::get('order','App\Http\Controllers\OrderPaymentController@index');
Route::post('orders', 'App\Http\Controllers\OrderPaymentController@store');
Route::get('order/create','App\Http\Controllers\OrderPaymentController@create');
Route::get('orders/tables', 'App\Http\Controllers\OrderPaymentController@tables');

//Rutas para reportes

Route::get('Report','App\Http\Controllers\DocumentController@order')->name('reports.orders');
Route::get('Report/orders/pdf', 'App\Http\Controllers\DocumentController@pdf')->name('reports.orders_pdf');
Route::get('Report/cita','App\Http\Controllers\DocumentController@cita');
Route::get('Report/citas','App\Http\Controllers\DocumentController@citas')->name('reports.citas');


//Rutas para horarios

Route::get('Horarios','App\Http\Controllers\AttendanceController@index')->name('horarios.index');
Route::get('Horarios/create/{id}', 'App\Http\Controllers\AttendanceController@create')->name('horarios.create');
Route::get('Horarios/dentist/{id}', 'App\Http\Controllers\AttendanceController@dentist');
Route::get('Horarios/tables', 'App\Http\Controllers\AttendanceController@tables');

//Rutas para historias clínicas
Route::get('Historia','App\Http\Controllers\ClinicHistoryController@index')->name('historia_clinica.index');
Route::post('Historia/create/historia','App\Http\Controllers\ClinicHistoryController@store');
Route::get('Historia/create/{id}','App\Http\Controllers\ClinicHistoryController@history')->name('historia_clinica.create');
Route::get('Historia/patient/{id}','App\Http\Controllers\ClinicHistoryController@patient');
Route::get('Historia/diagnostic/{id}','App\Http\Controllers\ClinicHistoryController@diagnostic');
Route::get('Historia/tables','App\Http\Controllers\ClinicHistoryController@table');

//Rutas para servicios
Route::get('Service/exchange_rate/{date}', 'App\Http\Controllers\ServiceController@exchangeRateTest');
Route::get('Service/{type}/{number}','App\Http\Controllers\ServiceController@service');

//Ruta para items
Route::get('Items','App\Http\Controllers\ItemController@index')->name('items.index');
Route::get('Items/create', 'App\Http\Controllers\ItemController@create')->name('items.create');
Route::get('Items/table', 'App\Http\Controllers\ItemController@table');
Route::get('Items/tables', 'App\Http\Controllers\ItemController@tables');
Route::post('Items', 'App\Http\Controllers\ItemController@store');
