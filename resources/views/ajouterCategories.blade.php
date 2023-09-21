@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link text-secondary "  href="/liste_formations">Les formations</a>
      </li>
    <li class="nav-item">
      <a class="nav-link text-secondary "href="/add_formation">Nouvelle formation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-secondary "  href="/inscrition_formation">Incription à une formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary "  href="/ajout_categori">Nouvelle categorie</a>
      </li>
  
 
  </ul>
  <h3 class="" style="color: #E62E36">Ajout de nouvelle categorie</h3>

<form action="/ajouter_categorie" method="POST">
  @csrf

      <div class="row mb-3" >
        <div class="col-md-8 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de la categorie*" value="{{ old('nom') }}" required>
               
              </div>
        </div>
       
       
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Ajouter la categorie</button>
   </div>
   

      </div>
    </form>
@endsection