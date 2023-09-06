@extends('layouts.dash')
@section('content')

<style>
    .upload-icon{
        cursor: pointer;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid p-0 ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/inscrire">Licence </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/master">Master</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/stage">Satge</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link d" href="/forma">
            Formations
          </a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link d" href="/certif">
              Cerification
            </a>
          
        </li>
      </ul>
    </div>
  </div>
</nav>
    <h3 class="text-danger">Inscrire un etudiant en certification</h3>

    <!--

    <a href="https://api.whatsapp.com/send?phone=0614036218" target="_blank">Envoyer un message WhatsApp</a>
    -->
    <form class="mb-3" id="myForm" method="POST" action="/add_certification" enctype="multipart/form-data">
        @csrf
     <div class="row" >
        <div class="col-md-4 col-xs-12">
            <div class="mb-3">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de l'etudiant*" value="{{ old('nom') }}" required>
               
              </div>
        </div>
        <div class="col-md-4 col-xs-12">  <div class="mb-3">
           
            <input type="text" class="form-control" id="prenom" aria-describedby="prenom" name="prenom" placeholder="Prenom de l'etudiant*" value="{{ old('prenom') }}" required>
          
          </div>
        </div>

        <div class="w-100 mb-3"></div>
        <div class=" col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="cin" aria-describedby="cin" name="cin_" placeholder="CIN de l'etudiant*" value="{{ old('cin_') }}" required>
               
              </div>

        </div>
        <div class="col-4 col-xs-12">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="niveau" aria-describedby="niveau" name="niveau" placeholder="Niveau de l'etudiant*" value="{{ old('niveau') }}" required >
               
              </div>

        </div>
        <div class="w-100 mb-3"></div>
        <div class=" col-8 col-xs-12 ">
            <div class="mb-4">
              
            <textarea class="form-control" placeholder="Specialité de l'etudiant*" id="specialite" name="specialite"  value="{{ old('specialite') }}" required></textarea>
 
             </div>

        </div>
        <div class="w-100 mb-3"></div>
        <div class="col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="telephone" aria-describedby="telephone" name="telephone" placeholder="Telephone*" value="{{ old('telephone') }}" required>
               
              </div>
        </div>
        <div class="col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="whatshapp" aria-describedby="whatshapp" name="whatshapp" placeholder="whatshapp" value="{{ old('whatshapp') }}">
               
              </div>
        </div>
        <div class=" w-100 mb-3 "></div>
        <div class="col-4"> 
          <div class="mb-3">
             @php
             $certifications= App\Models\listCertif::all();
             @endphp
        
             <select class="form-select" aria-label="Default select example" name="certification">
                 @forEach($certifications as $cat)
                 <option value="{{$cat->id}}">{{$cat->nom}}</option>
                 @endforeach
               
               </select>
       
       </div>
        <!--
      
        Liste des certificationns
      -->
     
    
        <div class=" w-100  mb-4"></div>
        <div class="col-2">
            <span class="text-secondary">CIN</span>
            <input type="file" class="file-input" id="fileInput1" style="display: none" name="cin" required>
            <label for="fileInput1">
              <i class="fas fa-cloud-upload-alt upload-icon"></i>
            </label>
          </div>
          
            <div class="w-100 h-6 bg-black" style="opacity:0">hhh</div>
        <div class="">
            <button type="submit" class="btn btn-danger text-light bold px-3 mb-3">Enregistrer</button>
        </div>
       
     </div>
     
  <script>
document.addEventListener('DOMContentLoaded', function() {
      const icons = document.querySelectorAll('.upload-icon');

      icons.forEach(icon => {
        icon.addEventListener('click', function() {
          const associatedFileInput = icon.parentElement.querySelector('.file-input');
          associatedFileInput.click();
        });
      });

    
    });
  </script>
   <script>
   
    </script>
@endsection