<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

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

// GENERAL

Route::get('/', [Controller::class, 'index'])->name('index');

Route::get('/search', function () {
	return view('search');
})->name('search');

Auth::routes();
Route::get('/home', function() { return redirect('/'); });

Route::get('/reports', function () {
	return view('reports.dashboard');
})->name('reports');

Route::get('/users', function () {
	return view('users');
})->name('users');

//  SPECIFICS

Route::get('/regulations', function () {
	return view('regulations');
})->name('regulations');

Route::get('/professions', function () {
	return view('professions');
})->name('professions');

Route::get('/types', function () {
	return view('types');
})->name('types');

Route::get('/issuers', function () {
	return view('issuers');
})->name('issuers');

// API

Route::get(
	'/api/v1/reports/professions/regulations/count',
	[Controller::class, 'professions_counter']
)->name('api_profession_regulations_count');

Route::get(
	'/api/v1/reports/types/regulations/count',
	[Controller::class, 'types_regulations_count']
)->name('api_types_regulations_count');

Route::get(
	'/api/v1/reports/issuers/regulations/count',
	[Controller::class, 'issuers_regulations_count']
)->name('api_issuers_regulations_count');

Route::get(
	'/api/v1/reports/timestamp/regulations/count',
	[Controller::class, 'timestamp_regulations_count']
)->name('api_timestamp_regulations_count');