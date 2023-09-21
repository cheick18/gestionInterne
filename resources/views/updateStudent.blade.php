@extends('layouts.dash')
@section('content')

<style>
    .upload-icon{
        cursor: pointer;
    }
</style>

<h3 class="" style="color: #E62E36">Modifier les informations relatives à une inscription</h3>
    

 <!--

    <a href="https://api.whatsapp.com/send?phone=0614036218" target="_blank">Envoyer un message WhatsApp</a>
    -->
    <form class="mb-3" id="myForm" method="POST" action="/updateInscrit_/{{$id}}" enctype="multipart/form-data">
        @csrf
     <div class="row" >
        <div class="col-md-4 col-xs-12">
            <div class="mb-3">
              
                <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de l'etudiant*" value="{{$inscrits->Nom }}" required>
               
              </div>
        </div>
        <div class="col-md-4 col-xs-12">  <div class="mb-3">
           
            <input type="text" class="form-control" id="prenom" aria-describedby="prenom" name="prenom" placeholder="Prenom de l'etudiant*" value="{{$inscrits->Prenom}}" required>
          
          </div>
        </div>

        <div class="w-100 mb-3"></div>
        <div class=" col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="cin" aria-describedby="cin" name="cin" placeholder="CIN de l'etudiant*" value="{{$inscrits->CIN}}" required>
               
              </div>

        </div>
        <div class="col-4 col-xs-12">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="niveau" aria-describedby="niveau" name="niveau" placeholder="Niveau de l'etudiant*" value="{{ $inscrits->Niveau }}" required >
               
              </div>

        </div>
        <div class="w-100 mb-3"></div>
        <div class=" col-8 col-xs-12 ">
            <div class="mb-4">
              
            <textarea class="form-control" placeholder="Specialité de l'etudiant*" id="specialite" name="specialite" required>{{$inscrits->Specialite}}</textarea>
 
             </div>

        </div>
        <div class="w-100 mb-3"></div>
        <div class="col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="telephone" aria-describedby="telephone" name="telephone" placeholder="Telephone*" value="{{$inscrits->Telephone}}" required>
               
              </div>
        </div>
        <div class="col-4">
            <div class="mb-4">
              
                <input type="text" class="form-control" id="whatshapp" aria-describedby="whatshapp" name="whatshapp" placeholder="whatshapp" value="{{ old('whatshapp') }}">
               
              </div>
        </div>
        <div class=" w-100 mb-3 "></div>
        <!--
      -->
      
    
        <div class=" w-100  mb-4"></div>
       
            <div class="w-100 h-6 bg-black" style="opacity:0">hhh</div>
        <div class="">
            <button type="submit" class="btn btn-danger text-light bold px-3 mb-3">Enregistrer</button>
        </div>
       
     </div>
     



<script>
   
    </script>

@endsection