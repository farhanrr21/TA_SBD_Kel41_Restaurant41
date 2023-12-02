<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('login');})->name('login');
Route::post('/', [LoginController::class, 'login'])->name('do-login');


Route::group(['middleware' => 'dashboard'],function() {
    Route::get('/dashboard-home', [DashboardController::class, 'showDashboard'])->name('home.dashboard');
    Route::get('/dashboard-pelanggan', [DashboardController::class, 'showPelanggan'])->name('pelanggan.dashboard');
    Route::get('/dashboard-menu', [DashboardController::class, 'showMenu'])->name('menu.dashboard');
    Route::get('/dashboard-stok', [DashboardController::class, 'showStok'])->name('stok.dashboard');
    Route::get('/dashboard-trash', [DashboardController::class, 'showTrash'])->name('trash.dashboard');
    Route::get('/dashboard-trash/restore-{id}-{db}', [DataController::class, 'restorePelanggan'])->name('restore');
    Route::post('/dashboard-pelanggan-search/{db}', [DashboardController::class, 'searchData'])->name('pelanggan.searchData');
    Route::post('/dashboard-menu-search/{db}', [DashboardController::class, 'searchData'])->name('menu.searchData');
    Route::post('/dashboard-stok-search/{db}', [DashboardController::class, 'searchData'])->name('stok.searchData');


    Route::get('/dashboard-pelanggan/addData', [DashboardController::class, 'addDataPelanggan'])->name('addData.pelanggan');
    Route::post('/dashboard-pelanggan/storeData', [DataController::class, 'storePelanggan'])->name('store.pelanggan');
    Route::get('/dashboard-pelanggan/editData-{id}', [DashboardController::class, 'editDataPelanggan'])->name('editData.pelanggan');
    Route::post('/dashboard-pelanggan/updateData-{id}', [DataController::class, 'updatePelanggan'])->name('update.pelanggan');
    Route::get('/dashboard-pelanggan/deleteData-{id}', [DataController::class, 'deletePelanggan'])->name('delete.pelanggan');
    Route::get('/dashboard-pelanggan/softDeleteData-{id}', [DataController::class, 'softPelanggan'])->name('soft.pelanggan');


    Route::get('/dashboard-menu/addData', [DashboardController::class, 'addDataMenu'])->name('addData.menu');
    Route::post('/dashboard-menu/storeData', [DataController::class, 'storeMenu'])->name('store.menu');
    Route::get('/dashboard-menu/editData-{id}', [DashboardController::class, 'editDataMenu'])->name('editData.menu');
    Route::post('/dashboard-menu/updateData-{id}', [DataController::class, 'updateMenu'])->name('update.menu');
    Route::get('/dashboard-menu/deleteData-{id}', [DataController::class, 'deleteMenu'])->name('delete.menu');
    Route::get('/dashboard-menu/softDeleteData-{id}', [DataController::class, 'softMenu'])->name('soft.menu');

    Route::get('/dashboard-stok/addData', [DashboardController::class, 'addDataStok'])->name('addData.stok');
    Route::post('/dashboard-stok/storeData', [DataController::class, 'storeStok'])->name('store.stok');
    Route::get('/dashboard-stok/editData-{id}', [DashboardController::class, 'editDataStok'])->name('editData.stok');
    Route::post('/dashboard-stok/updateData-{id}', [DataController::class, 'updateStok'])->name('update.stok');
    Route::get('/dashboard-stok/deleteData-{id}', [DataController::class, 'deleteStok'])->name('delete.stok');
    Route::get('/dashboard-stok/softDeleteData-{id}', [DataController::class, 'softStok'])->name('soft.stok');

    Route::get('/logout', [LoginController::class, 'logout'])->name('do-logout');
});
