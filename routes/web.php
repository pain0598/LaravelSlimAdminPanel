<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PropertyController;


use App\Http\Controllers\UserPanelController;

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




Route::get('/',[AdminController::class,'index']);
Route::get('renter-info-update-history',[ClientController::class,'renterInfoUpdateHistory']);
Route::get('school-management',[ClientController::class,'schoolManagement']);
Route::post('school-store',[ClientController::class,'schoolStore'])->name('schoolManagement.store');
Route::post('/school-management/{id}',[ClientController::class, 'schoolDelete']);

Route::post('/school-management/selected',[ClientController::class, 'schoolSelected'])->name('schoolManagement.deleteSelected');;

Route::get('pets-management',[ClientController::class,'petsManagement'])->name('pets.management');
Route::get('click_to_call_history',[ClientController::class,'callHistory'])->name('call-history');
Route::get('notify-history',[ClientController::class,'notifyHistory'])->name('notify-history');



Route::get('add-manager',[ManagerController::class,'addManager'])->name('add-manager');
Route::get('add-user',[ManagerController::class,'addUser'])->name('add-user');
Route::post('create-manager',[ManagerController::class,'createManager'])->name('create-manager');
Route::post('create-renter',[ManagerController::class,'createRenter'])->name('create-renter');
Route::get('search-renter',[ManagerController::class,'searchRenter'])->name('search-renter');
Route::get('searched-renters',[ManagerController::class,'getSearchedRenter'])->name('searched-renters');

Route::get('search-manager',[ManagerController::class,'searchManager'])->name('search-manager');


Route::get('list-manager',[PropertyController::class,'listManager'])->name('list-manager');
Route::get('advance-search',[PropertyController::class,'advanceSearch'])->name('advance-search');


Route::group(['prefix' => 'administration'],function(){
    Route::get('my-office-reports',[ManagerController::class,'myOfficeReports'])->name('admin-my-office-reports');
    Route::get('manage-sources',[AdministrationController::class,'managesources'])->name('admin-manage-sources');
    Route::get('manage-sources1',[AdministrationController::class,'managesources1'])->name('admin-manage-sources1');
});






Route::group(['prefix'=>'users'],function(){
    Route::get('/',[UserPanelController::class,'index'])->name('users-index');
});
