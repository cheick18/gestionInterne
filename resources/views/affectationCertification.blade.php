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

  <h3 class="" style="color: #E62E36">Affectation à une certification</h3>

<form action="/affectation_certif" method="POST" enctype="multipart/form-data">
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
                $categorie= App\Models\listCertif::all();
                @endphp
           
                <select class="form-select" aria-label="Default select example" name="nom">
                    @forEach($categorie as $cat)
                 
                    <option value="{{$cat->id}}">{{$cat->nom}}</option>
                   
                
                    @endforeach
                  
                  </select>
          
          </div>
          
        </div>
       </div>
   <div class="w-100"></div>
   <div class="mb-3">
    <span class="text-secondary">Cin pour la certification</span>
    <input type="file" class="file-input" id="fileInput2" style="display: none" name="cinui" required>
    <label for="fileInput2">
      <i class="fas fa-cloud-upload-alt upload-icon" style="cursor: pointer"></i>
    </label>
  </div>
  <div class="w-100"></div>
   <div class="col-4">
    <button class="btn btn-danger">Inscrire à la certification</button>
   </div>
   

      </div>
    </form>
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      const icon = document.querySelectorAll('.upload-icon');

      
        icon.addEventListener('click', function() {
          const associatedFileInput = icon.parentElement.querySelector('.file-input');
          associatedFileInput.click();
        });
    

    
    });
  </script>
@endsection