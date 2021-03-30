<?php

use Illuminate\Support\Facades\Route;

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
    return view('frontend.main');
});

Route::resource('sign-up', App\Http\Controllers\SignupController::class);

Route::get('/log-in', function () {
    return view('admin.auth.login');
})->name('slash');

Route::get('/problem', function () {
    return view('403_error');
});

Route::get('/test', function () {
    return view('admin.congrats');
});

Route::get('/uploader', function () {
    return view('errors.500');
});

Route::get('/problem', function () {
  return view('admin.error_403');
});

// Route::get('/guzzle', [App\Http\Controllers\GuzzleController::class, 'index']);

Route::group(['middleware' => 'auth'], function () {

	   Route::get('/congratulations', function () {
    return view('admin.congrats');
});

Route::resource('redirect', App\Http\Controllers\RedirectController::class);
Route::post('/back_to_home', [App\Http\Controllers\RedirectController::class,'force_logout'])->name('forced');
Route::post('/log-out', [App\Http\Controllers\RedirectController::class,'log_out'])->name('log-out');

Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
Route::post('/add-booking', [App\Http\Controllers\DashboardController::class,'add_booking'])->name('add_booking');
Route::post('/dashboard/update/{id}', [App\Http\Controllers\DashboardController::class,'update'])->name('booking_up');
Route::get('/dashboard/destroy/{id}', [App\Http\Controllers\DashboardController::class, 'destroy'])->name('booking_del');
Route::get('/dynamic_dependent/booking-details',[App\Http\Controllers\DashboardController::class, 'booking_details'])->name('dynamicdependent.booking_details');

Route::resource('agent', App\Http\Controllers\AgentController::class);
Route::post('/add-agent', [App\Http\Controllers\AgentController::class,'add_agent'])->name('add_agent');
Route::post('/agent/update/{id}', [App\Http\Controllers\AgentController::class,'update'])->name('agent_up');
Route::get('/agent/destroy/{id}', [App\Http\Controllers\AgentController::class, 'destroy'])->name('agent_del');

Route::resource('redirect', App\Http\Controllers\RedirectController::class);
//Super Admin Modules
Route::resource('modules', App\Http\Controllers\ModulesController::class);
Route::post('/module/update/{id}', [App\Http\Controllers\ModulesController::class,'update'])->name('module_up');

Route::resource('permissions', App\Http\Controllers\ModuleActionsController::class);
Route::post('/permission/update/{id}', [App\Http\Controllers\ModuleActionsController::class,'update'])->name('permission_up');

Route::resource('roles', App\Http\Controllers\RolesController::class);
Route::get('/roles/destroy/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role_del');
Route::post('/roles/update/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role_up');

Route::resource('users', App\Http\Controllers\AdminUsersController::class);
Route::post('/users/update/{id}', [App\Http\Controllers\AdminUsersController::class,'update'])->name('users_up');


});