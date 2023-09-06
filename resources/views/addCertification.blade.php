@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link text-secondary "  href="/liste_certifications">Liste des certification</a>
    </li>
      <li class="nav-item">
        <a class="nav-link text-secondary "href="/add_certification">Nouvelle certification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-secondary "  href="/affectation_certification">Affectation à une certification</a>
      </li>
    
   
    </ul>
  <h3 class="text-danger">Ajouter une certification</h3>

<form action="/ajouter_certification" method="POST">
  @csrf
   

      <div class="row mb-3" >
        <div class="col-md-4 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de la certification*" value="{{ old('nom') }}" required>
               
              </div>
        </div>
      
       <div class="col-md-4 col-xs-12"> 
        <div class="mb-3">
      
       <input type="text" class="form-control" id="prenom" aria-describedby="prix" name="prix" placeholder="Prix de la certification*" value="{{ old('prix') }}" required>
     
     </div>
     
   </div>
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Ajouter la certification</button>
   </div>
   

      </div>
    </form>
@endsection