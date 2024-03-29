<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/support-me', function () {
	return view('support-me');
});
Route::get('/transparency', 'TransparencyController@index')->name('transparency');

// List View/Upload Routes.
Route::get('/lists', 'LoadOrderController@index')->name('lists');
Route::get('/upload', 'LoadOrderController@create')->name('upload');
Route::post('/upload', 'LoadOrderController@store')->name('upload.store');
Route::get('/lists/{load_order:slug}/edit', 'LoadOrderController@edit')->name('lists.edit');
Route::put('/lists/{load_order:slug}', 'LoadOrderController@update')->name('lists.update');
Route::get('/lists/{load_order:slug}', 'LoadOrderController@show');
Route::get('/lists/{load_order:slug}/download/{file}', 'DownloadController@index');
Route::delete('/lists/{load_order:slug}', 'LoadOrderController@destroy');
Route::get('/lists/{load_order:slug}/embed/{file}', 'LoadOrderController@embed');

// Comparison Routes.
Route::get('/compare', 'ComparisonController@index')->name('compare');
Route::post('/compare', 'ComparisonController@post')->name('compare.post');
Route::get('/compare/{load_order}/{load_order2}', 'ComparisonController@results')->name('compare.results');

// User account management routes
Route::get('/profile', 'UserController@index')->middleware(['auth', 'password.confirm'])->name('user.profile');
Route::post('/user/delete', 'UserController@destroy')->name('user.delete-account');
Route::get('/profile/api-tokens', function () {
	return view('user.api-tokens');
})->middleware(['auth', 'password.confirm'])->name('user.api-tokens');
Route::post('/profile/api-tokens', 'UserController@api_tokens')->name('user.api-tokens.post');
Route::delete('/profile/api-tokens/{tokenId}', 'UserController@delete_api_token')->name('user.api-tokens.delete');

// Admin routes
Route::get('admin/stats', 'AdminController@stats')->name('admin.stats');
Route::get('admin/users', 'AdminController@users')->name('admin.users');
Route::post('admin/users/verify/{user:id}', 'AdminController@verify')->name('admin.users.verify');
Route::get('/admin/backups', 'AdminController@backups')->name('admin.backup');
Route::get('/admin/backups/download/{id}', 'AdminController@downloadBackup')->name('admin.download-backup');
Route::delete('/admin/backups/delete/{id}', 'AdminController@deleteBackup')->name('admin.delete-backup');
Route::get('/admin/games', 'GameController@create')->name('admin.games');
Route::post('/admin/games', 'GameController@store')->name('admin.games.post');

// Health Check for Uptime Kuma and others
Route::get('/health', function () {
	return ['status' => 'healthy'];
});
