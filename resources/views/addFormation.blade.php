@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link text-secondary "href="#">Nouvelle formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary "  href="#">Nouvelle categorie</a>
      </li>
  
 
  </ul>
  <h3 class="text-danger">Ajouter une formation</h3>

<form>
   

      <div class="row mb-3" >
        <div class="col-md-4 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de la formation*" value="{{ old('nom') }}" required>
               
              </div>
        </div>
        <div class="col-md-4 col-xs-12"> 
             <div class="mb-3">
                @php
                $categorie= App\Models\Categories::all();
                @endphp
           
                <select class="form-select" aria-label="Default select example">
                    @forEach($categorie as $cat)
                    <option value="{{$cat->id}}">{{$cat->name_categorie}}</option>
                    @endforeach
                  
                  </select>
          
          </div>
          
        </div>
       <div class="w-100 mb-3"></div>
       <div class="col-md-4 col-xs-12"> 
        <div class="mb-3">
      
       <input type="text" class="form-control" id="prenom" aria-describedby="prenom" name="prenom" placeholder="Prix de la formation*" value="{{ old('prenom') }}" required>
     
     </div>
     
   </div>
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Ajouter la formation</button>
   </div>
   

      </div>
    </form>
@endsection