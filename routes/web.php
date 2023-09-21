<?php

use App\Http\Controllers\addCertificationController;
use App\Http\Controllers\addFormationController;
use App\Http\Controllers\affectCertifController;
use App\Http\Controllers\ajouterCategorie;
use App\Http\Controllers\ajouterFormation;
use App\Http\Controllers\certifFromUpdate;
use App\Http\Controllers\certificationInscriptionController;
use App\Http\Controllers\chargerdataFormationController;
use App\Http\Controllers\deleteCertificationController;
use App\Http\Controllers\DeleteinscritController;
use App\Http\Controllers\deleteUser;
use App\Http\Controllers\deletFormation;
use App\Http\Controllers\detailCertifController;
use App\Http\Controllers\detailFormationController;
use App\Http\Controllers\downloadFileController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\getYearController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\inscrireEtudiantFormation;
use App\Http\Controllers\MailController;
use App\Http\Controllers\masterController;
use App\Http\Controllers\paiementController;
use App\Http\Controllers\SaveCertifUpdate;
use App\Http\Controllers\saveFormationController;
use App\Http\Controllers\savepaimentVirement;
use App\Http\Controllers\savePaymentController;
use App\Http\Controllers\saveStudentController;
use App\Http\Controllers\showFormation;
use App\Http\Controllers\stageController;
use App\Http\Controllers\telechargerRecu;
use App\Http\Controllers\updateFormationController;
use App\Http\Controllers\updateInscritController;
use App\Http\Controllers\updateUserController;
use App\Mail\ExempleMail;
use App\Models\Categories;
use App\Models\Formations;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
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
/*Route::get('/det/{id}', function ($id) {
    $formations= new Formations();
    $formations= Formations::find($id);
    
    return view('detailsFormation',['form'=>$formations]);
});*/
Route::get('/delete/{id}',[deletFormation::class,'deleteformation']);
Route::get('/ins', function () {

    
    return view('allinscrit');
});

Route::get('/test',[MailController::class,'sendmail']);
Route::get('/payment',[paiementController::class,'payment']);
/*paymentB*/
/*Route::get('/test',[paiementController::class,'paymentB']);*/
Route::post('/paymentAnuelle/{id}',[savePaymentController::class,'paymentAnuelle']);
Route::post('paymentVirement/{id}',[savepaimentVirement::class,'byvirement']);
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
    if (Auth::user()->name === 'admin') {
        return view('navtest');
    } else {
        return view('allinscrit');
    }
    
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
Route::get('/inscrire',[InscriptionController::class,'inscrire']);
Route::post('/add/{id}',[saveStudentController::class,'saveStudet']);
Route::post('/add_master/{id}',[masterController::class,'storemaster']);
Route::post('/add_stage/{id}',[stageController::class,'storeStage']);
Route::post('/add_formation/{id}',[saveFormationController::class,'stroeAtformation']);
Route::get('/all',function(){
    return view('allinscrit');
});
Route::get('/all_master',function(){
    return view('allmaster');
});
Route::get('/all_licence',function(){
    return view('alllicence');
});
Route::get('/all_stage',function(){
    return view('allstage');
});
Route::get('/all_formation',function(){
    return view('allformation');
});
Route::get('/all_certification',function(){
    return view('allcertification');
});

Route::get("/facture", function(){
    return view ('FactureStudent');
});
Route::get('/add_formation',function(){
    return view('addFormation');

});
Route::get('/inscrition_formation',function(){
    return view('Inscription_formation');
});

Route::get('/ajout_categori',function(){
    return view('ajouterCategories');

});
Route::get('/liste_formations',function(){
    return view('listFormation');
});

Route::get('add_certification',function(){
    return view('addCertification');
});
Route::get('/liste_certifications',function(){
 return view('listedesCertification');
});
Route::get('/detailFormation/{id}', [detailFormationController::class,'send']);
Route::post('/ajouter_formation',[ajouterFormation::class,'ajouterformation']);
Route::post('/affectation_etudiant',[inscrireEtudiantFormation::class,'affectationEtudiant']);
Route::post('/ajouter_categorie', [ajouterCategorie::class,'ajouterCategorie']);
Route::get('/updateFormation/{id}',[chargerdataFormationController::class,'chargerData']);
Route::get('/modif_inscription/{id}',function($id){
    $inscri=Inscription::find($id);
    return view('updateStudent',['id'=>$id,
'inscrits'=>$inscri]);
});
Route::post('/modifierFormation/{id}',[updateFormationController::class,'update']);
Route::post('/showFormation',[showFormation::class,'show']);

Route::post('/updateInscrit_/{id}',[updateInscritController::class,'updateInscrit']);


Route::post('/delete/{id}',[DeleteinscritController::class,'DeleteInscrits']);

Route::post('/deleteUser/{id}',function($id){
    $user= User::find($id);
    $user->delete();
    return redirect('/dashboard');
});
Route::post('/deleteCertif/{id}',[deleteCertificationController::class,'delete']);

Route::post('/formeUpdate',[certifFromUpdate::class,'form']);

Route::get('/certif',function(){
    return view('Certification');
});
Route::post('/add_certification', [certificationInscriptionController::class,'storeAtCertif']);
Route::post('/ajouter_certification',[addCertificationController::class,'addCertification']);
Route::get('/affectation_certification',function(){
return view('affectationCertification');
});
/*Route::get('/detailDecertification',function(){
  return view('detailCertification');
});*/
Route::post('/affectation_certif',[affectCertifController::class,'affectCertif']);
Route::post('/detailcertif',[detailCertifController::class,'sendCertif']);
/*Route::post('/detailcertif',function(){
    
    return view('detailCertification');
});*/
Route::post('/modif_user/{id}',function($id){
    
    $use= User::find($id);
    return view('modifUser',['user'=>$use]);

});
Route::post('/Udate_certif/{id}',[SaveCertifUpdate::class,'update']);
Route::post('/save_update_user/{id}',[updateUserController::class,'store']);
Route::get('/export',[ExportController::class,'export']);
Route::get('/virement',function(){
    $cat= Categories::all();
    return view('paiB',['categories'=>$cat]);
});
});

Route::get('/dataanalye',function(){

    return view('DataAnalyse');
});
Route::post('/getYear',[getYearController::class,'getyear']);

Route::get('/file',[downloadFileController::class,'file']);

Route::post('/telecharger-fichier/{nomDuFichier}', [telechargerRecu::class,'telechargerFichier'])->name('telecharger-fichier');

require __DIR__.'/auth.php';
