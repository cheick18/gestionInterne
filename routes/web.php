<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\paiementController;
use App\Http\Controllers\savePaymentController;
use App\Http\Controllers\saveStudentController;
use App\Mail\ExempleMail;
use App\Models\Inscription;
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
    return view('auth.register');
});
Route::get('/ins', function () {
    return view('dashboradSalarie');
});

Route::get('/test',[MailController::class,'sendmail']);
Route::get('/payment',[paiementController::class,'payment']);
/*paymentB*/
/*Route::get('/test',[paiementController::class,'paymentB']);*/
Route::post('/paymentAnuelle',[savePaymentController::class,'paymentAnuelle']);
Route::post('/pos',function(){
    return view('welcome');
});

Route::get('/autrepay',function(){
    return view('solution');

});

Route::get('/master',function(){
    return view('Master');

});
Route::get('/stage',function(){
    return view('Stage');

});
Route::get('/forma',function(){
    return view('FprmationType');

});



Route::get('/dashboard', function () {
    return view('dashboradSalarie');
})->middleware(['auth'])->name('dashboard');
Route::get('/inscrire',[InscriptionController::class,'inscrire']);
Route::post('/add/{id}',[saveStudentController::class,'saveStudet']);
Route::post('/add_master/{id}',[masterController::class,'storemaster']);


require __DIR__.'/auth.php';
