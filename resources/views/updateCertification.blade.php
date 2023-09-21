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
  <h3 class="" style="color: #E62E36">Modifier la certification</h3>

<form action="/Udate_certif/{{ $certif->id}}" method="POST">
  @csrf
  

      <div class="row mb-3" >
        <div class="col-md-4 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="" value="{{$certif->nom}}" required>
               
              </div>
        </div>
      
       <div class="col-md-4 col-xs-12"> 
        <div class="mb-3">
      
       <input type="text" class="form-control" id="prenom" aria-describedby="prix" name="prix" placeholder="" value="{{ $certif->prix}}" required>
     
     </div>
     
   </div>
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Modifier</button>
   </div>
   

      </div>
    </form>
@endsection