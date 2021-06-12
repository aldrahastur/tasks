<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\TaskController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('userProfile');
    Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcomeUserPage');
    Route::group(['prefix'=> 'admin', 'as' => 'admin.', 'middleware'=> 'admin'], function () {
        Route::resource('customers', \App\Http\Controllers\Admin\CustomerController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('pages', PageController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('checklist-groups', ChecklistGroupController::class);
        Route::resource('checklist-groups.checklists', ChecklistController::class);
        Route::resource('checklists.tasks', TaskController::class);
    });
});
