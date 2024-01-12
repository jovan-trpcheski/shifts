<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShiftController;
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

Route::get('/', function () {
    return redirect()->route('shifts.index');
});

Route::resource('shifts', ShiftController::class);

Route::get('/employees', [ShiftController::class, 'employees'])->name('employees');
Route::get('/employees/{name}', [ShiftController::class, 'details'])->name('employee.details');

Route::get('/import', [ShiftController::class, 'importForm'])->name('import.form');
Route::post('/import', [ShiftController::class, 'import'])->name('import');


require __DIR__.'/auth.php';
