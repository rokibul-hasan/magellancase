<?php

use App\Http\Controllers\MagellanCaseController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function(){
    
    Route::get('userlist',[UserController::class,'userlist'])->name('userlist');
    Route::resource('user',UserController::class);

    Route::resource('case',MagellanCaseController::class);
    Route::get('phase1',[MagellanCaseController::class,'phase1'])->name('phase1');
    // Route::get('phase2a',[MagellanCaseController::class,'phase2a'])->name('phase2a');
    Route::get('phase2b',[MagellanCaseController::class,'phase2b'])->name('phase2b');
    Route::get('phase3',[MagellanCaseController::class,'phase3'])->name('phase3');
    Route::get('phase4',[MagellanCaseController::class,'phase4'])->name('phase4');


    Route::get('phase2a',function(){
        return view('cases.phase2a');
    })->name('phase2a');

});

require __DIR__.'/auth.php';
