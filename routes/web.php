<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Purple\GeneralController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\HeadlessController;

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

Route::get('/set-client-timezone', 
    [GeneralController::class, 'setClientTimezone']
)->name('setClientTimezone');

Route::get('/sitemap.xml', 
    [SeoController::class, 'sitemap']
)->name('websiteSitemap');

Route::get('/robots.txt', 
    [SeoController::class, 'robots']
)->name('websiteRobots');


Route::name('productionSite.')->group(function () {
    Route::get('/user-verification', 'App\Http\Controllers\ProductionController@userVerification')->name('userVerification');
    Route::get('/code-verification', 'App\Http\Controllers\ProductionController@codeVerification')->name('codeVerification');
    Route::get('/database-migration', 'App\Http\Controllers\ProductionController@databaseMigration')->name('databaseMigration');
    Route::get('/database-migration', 'App\Http\Controllers\ProductionController@databaseMigration')->name('databaseMigration');
    Route::post('/ajax-user-verification', 'App\Http\Controllers\ProductionController@ajaxUserVerification')->name('ajaxUserVerification');
    Route::post('/ajax-code-verification', 'App\Http\Controllers\ProductionController@ajaxCodeVerification')->name('ajaxCodeVerification');
});


Route::get('/', 
    [HeadlessController::class, 'show']
)->name('websiteSetAsHeadlessCms');


Route::group(['prefix' => '{locale}/setup', 'as' => 'setup.'], function ($locale) {
    if (!in_array($locale, ['en', 'id'])) {
        abort(400);
    }

    Route::get('/', 'App\Http\Controllers\SetupController@database')->name('database');
    Route::get('/administrative', 'App\Http\Controllers\SetupController@administrative')->name('administrative');
    Route::get('/finish', 'App\Http\Controllers\SetupController@finish')->name('finish');
    Route::get('/ajax-database', 'App\Http\Controllers\SetupController@ajaxDatabase')->name('ajaxDatabase');
    Route::get('/ajax-administrative', 'App\Http\Controllers\SetupController@ajaxAdministrative')->name('ajaxAdministrative');
});
