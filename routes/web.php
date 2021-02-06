<?php

use Illuminate\Support\Facades\Route;
use Azuriom\Plugin\Dofus\Controllers\LadderController;
use Azuriom\Plugin\Dofus\Controllers\MarketController;
use Azuriom\Plugin\Dofus\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your plugin. These
| routes are loaded by the RouteServiceProvider of your plugin within
| a group which contains the "web" middleware group and your plugin name
| as prefix. Now create something great!
|
*/

Route::get('/', 'DofusHomeController@index');

Route::prefix('accounts')->name('accounts.')->middleware('auth')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::post('/', [AccountController::class, 'store'])->name('store');
});

Route::prefix('ladder')->name('ladder.')->group(function(){
    Route::get('/pvm', [LadderController::class, 'pvm'])->name('pvm');
    Route::get('/pvp', [LadderController::class, 'pvp'])->name('pvp');
    Route::get('/koli/3vs3', [LadderController::class, 'koli_3v3'])->name('3vs3');
    Route::get('/koli/1vs1', [LadderController::class, 'koli_1v1'])->name('1vs1');
    Route::get('/koli/3vs3', [LadderController::class, 'koli_3v3'])->name('3vs3');
});

Route::prefix('market')->name('market.')->group(function(){
    Route::get('/', [MarketController::class, 'index'])->name('index');
    Route::get('/{marketListing}',[MarketController::class, 'show'])->name('show');
});
