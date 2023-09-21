@extends('layouts.dash')
@section('content')
<style>
  @media (max-width: 767px) {
    option {
        width: auto;
        
    }
  }

</style>
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
  <h3 class=""  style="color: #E62E36">Affectation à une formation</h3>

<form action="/affectation_etudiant" method="POST">
  @csrf

      <div class="row mb-3" >
        <div class="col-md-4 col-xs-12 mb-3">
            <div class="">
              
                <input type="text" class="form-control" id="nom" aria-describedby="cin" name="cin" placeholder="Cin de l'etudiant*" value="{{ old('cin') }}" required>
               
              </div>
        </div>
        <div class="col-md-4 col-xs-12"> 
             <div class="mb-3">
                @php
                $categorie= App\Models\Categories::all();
                @endphp
           
                <select class="form-select form-control" aria-label="Default select example" name="formation">
                    @forEach($categorie as $cat)
                    @forEach($cat->formations as $cate)
                    <option value="{{$cate->id}}">{{$cate->nom}}</option>
                   
                    @endforeach
                    @endforeach
                  
                  </select>
          
          </div>
          
        </div>
       </div>
   <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Inscrire à la formation</button>
   </div>
   

      </div>
    </form>
@endsection