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
  <h3 class="text-danger">Modifier un utilisateur</h3>
  @php
  

  @endphp

<form method="post" action="/save_update_user/{{$user->id}}" >
  @csrf
   

      <div class="row mb-3" >
        <div class="col-md-4 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name"  value="{{$user->name}}" required>
               
              </div>
        </div>
        <div class="col-md-4 col-xs-12"> 
             <div class="mb-3">
              
                <input type="mail" class="form-control" id="email" aria-describedby="mail" name="email"  value="{{$user->email}}" required>
              
          
          </div>
          
        </div>
       <div class="w-100 mb-3"></div>
       <div class="col-md-4 col-xs-12"> 
        <div class="mb-3">
      
       <input type="text" class="form-control" id="pass" aria-describedby="password" name="password" placeholder="Nouveau mot de passe *" value="{{ old('password')}}">
     
     </div>
     
   </div>
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Modifier</button>
   </div>
   

      </div>
    </form>
@endsection