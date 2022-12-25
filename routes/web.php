<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoadDataController;
use App\Http\Controllers\DashboardController;

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
Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('designation', DesignationController::class);

    Route::resource('department', DepartmentController::class);

    Route::resource('company', CompanyController::class);

    Route::resource('user', UserController::class);

    Route::resource('employee', EmployeeController::class);

    Route::post('/loaddata', [LoadDataController::class, 'loadData'])->name('loaddata');

    Route::resource('fiscal-year', FiscalYearController::class);

    Route::resource('leave-category', LeaveCategoryController::class);

    Route::resource('leave-application', LeaveApplicationController::class);

    Route::get('leave-application/pdf/{id}', [LeaveApplicationController::class, 'createPdf'])->name('leave-application.pdf');

    Route::get('/attachement/{id}', [LeaveApplicationController::class, 'viewAttachment'])->name('attachment.view');
    
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
