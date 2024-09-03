<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PetController;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Pet;

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

Route::get('/', function () {
    return view('auth/login');
});




Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard/audit', [AuditController::class, 'index'])->middleware('auth.admin');
Route::get('/dashboard/audit', [AuditController::class, 'show'])->middleware('auth.admin');


//Inventory
Route::post('/dashboard/inventory/medicine/delete/{id}', [InventoryController::class, 'delete'])->middleware('auth.admin') ->name('delete.inventory');

Route::get('/dashboard/inventory/medicine', [InventoryController::class, 'index'])->middleware('auth.admin');

Route::post('/dashboard/inventory/medicine/store', [InventoryController::class, 'store'])->middleware('auth.admin')->name('store.inventory');

Route::get('/dashboard/inventory/medicine/search', [InventoryController::class, 'search'])->middleware('auth.admin')->name('search.inventory');

Route::get('/dashboard/patient', [PatientController::class, 'index'])->middleware('auth.admin')->name('patient.index');

//Patient
Route::get('/dashboard/patient', [PatientController::class, 'index'])->middleware('auth.doctor')->name('patient.index');

//Transaction
Route::get('/dashboard/transactions', [TransactionController::class, 'index'])->middleware('auth.admin');

Route::get('/dashboard/transactions/get-stocks/{medicineId}', [TransactionController::class, 'getStocks'])->middleware('auth.admin')-> name('get-stocks');
Route::get('/dashboard/transactions/get-stocks/{medicineId}/{quantity}', [TransactionController::class, 'getpayment'])->middleware('auth.admin')-> name('get-payment');
Route::post('/dashboard/transactions/store', [TransactionController::class, 'store'])->middleware('auth.admin')->name('store.transaction');


Route::post('/dashboard/customer/diagnosis/store', [TransactionController::class, 'fromDiagnosis'])->middleware('auth.admin')->name('fromDiagnosis.transaction');

Route::get('/dashboard/customer/diagnosis/{id}',[CustomerController::class, 'customerDiagnosis'])->middleware('auth.admin')->name('customer.diagnosis');


//Customer
Route::get('/dashboard/customer', [CustomerController::class, 'index'])->middleware('auth.admin');
Route::get('/dashboard/customer', [CustomerController::class, 'show'])->middleware('auth.admin');
Route::get('/dashboard/customer/view', [CustomerController::class, 'view'])->middleware('auth.admin')->name('show.customer');
Route::post('/dashboard/customer/delete/{id}', [CustomerController::class, 'destroy'])->middleware('auth.admin')->name('destroy.customer');


Route::get('/dashboard/customer/appointment', [CustomerController::class, 'appointmentForm'])->middleware('auth.customer');
Route::post('/dashboard/customer/appointment/store', [CustomerController::class, 'store'])->middleware('auth.customer')->name('store.appointment');


//Pet
Route::get('/dashboard/customer/view/{id}', [PetController::class, 'index'])->middleware('auth.admin');
Route::post('/dashboard/customer/view/store/{id}', [PetController::class, 'store'])->middleware('auth.admin')->name('store.pet');
Route::put('/dashboard/customer/view/update/{id}', [PetController::class, 'update'])->middleware('auth.admin')->name('update.customer');


Route::get('/dashboard/appointment', [AppointmentController::class, 'index'])->middleware('auth.admin');

//Analytics
Route::get('/dashboard/analytics', [AnalyticsController::class, 'index'])->middleware('auth.admin');

//Need pani organize
Route::get('/test', function () {
    return view('test');
})->middleware('auth.customer');

Route::get('/test-category', function () {
    return view('test-category');
})->middleware('auth.customer');

Route::get('/test-customer-medical-records', [PatientController::class, 'getRecords'])->middleware('auth.customer');


Route::get('/test-customer-purchase', [CustomerController::class, 'customerPurchase'])->middleware('auth.customer');

// Route::get('/test-customer-purchase', [CustomerController::class, 'getPurchase']);



//Doctor
Route::get('/test-doctor',[DoctorController::class, 'index'])->middleware('auth.doctor');
Route::post('/test-doctor/{id}', [DoctorController::class, 'update'])->middleware('auth.doctor')->name('update.session');
Route::get('/test-doctor-generate', [PatientController::class, 'index'])->middleware('auth.doctor');
Route::get('/test-doctor-medical-records/{id}', [PatientController::class, 'record'])->name('record.patient')->middleware('auth.doctor');
Route::post('/test-doctor-medical-records/store/{id}', [PatientController::class, 'store'])->name('store.medical-record')->middleware('auth.doctor');



require __DIR__.'/auth.php';
