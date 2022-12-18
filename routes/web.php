<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Fiscal_yearController;
use App\Http\Controllers\Leave_categoryController;
use App\Http\Controllers\Leave_applicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Load_dataController;

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

Route::resource('designation', DesignationController::class);

Route::resource('department', DepartmentController::class);

Route::resource('company', CompanyController::class);

Route::resource('user', UserController::class);

Route::resource('employee', EmployeeController::class);

Route::post('/loaddata', [Load_dataController::class, 'loadData'])->name('loaddata');

Route::resource('fiscal_year', Fiscal_yearController::class);

Route::resource('leave_category', Leave_categoryController::class);

Route::resource('leave_application', Leave_applicationController::class);

Route::get('/attachement/{id}', [Leave_applicationController::class, 'viewAttachment'])->name('attachment.view');