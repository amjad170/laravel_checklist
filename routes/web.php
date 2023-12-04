<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/index', function () {
//     return view('index');
// });

Route::get('/checklist/all',[ChecklistController::class, 'index'])->name('checklist.all');
Route::post('/checklist/store',[ChecklistController::class, 'store'])->name('checklist.store');
Route::get('/checklist/editShow',[ChecklistController::class, 'create'])->name('checklist.editShow');
Route::get('/checklist/delete/{id}',[ChecklistController::class, 'delete'])->name('checklist.delete');

Route::get('/checklist/edit/{id}',[ChecklistController::class, 'edit'])->name('checklist.edit');
Route::post('/checklist/update/{id}',[ChecklistController::class, 'update'])->name('checklist.update');
