<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
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

// Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Route::get('/contacts/company/{id?}',[ContactController::class, 'filteredContacts'])->name('contacts.company.filter');

// Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');

// Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

// Route::get('/contacts/edit/{contact}',[ContactController::class, 'edit'])->name('contacts.edit');

// Route::post('/contacts/upgrade',[ContactController::class, 'update'])->name('contacts.update');

// Route::post('/contacts/store',[ContactController::class, 'store'])->name('contacts.store');

// Route::post('/contacts/erase',[ContactController::class, 'erase'])->name('contacts.erase');

Route::apiResource('/companies.contacts',CompanyController::class);
