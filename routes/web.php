<?php

use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\paiementController;
use App\Http\Controllers\saveFormationController;
use App\Http\Controllers\savePaymentController;
use App\Http\Controllers\saveStudentController;
use App\Http\Controllers\stageController;
use App\Mail\ExempleMail;
use App\Models\Categories;
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
    $categories= new Categories();
    $categories= Categories::all();
    return view('Master',['categories' => $categories]);

});
Route::get('/stage',function(){
    $categories= new Categories();
    $categories= Categories::all();
    return view('Stage',['categories' => $categories]);

});
Route::get('/forma',function(){
    $categories= new Categories();
    $categories= Categories::all();
    return view('FprmationType',['categories' => $categories]);

});



Route::get('/dashboard', function () {
    return view('dashboradSalarie');
})->middleware(['auth'])->name('dashboard');
Route::get('/inscrire',[InscriptionController::class,'inscrire']);
Route::post('/add/{id}',[saveStudentController::class,'saveStudet']);
Route::post('/add_master/{id}',[masterController::class,'storemaster']);
Route::post('/add_stage/{id}',[stageController::class,'storeStage']);
Route::post('/add_formation/{id}',[saveFormationController::class,'stroeAtformation']);

require __DIR__.'/auth.php';
