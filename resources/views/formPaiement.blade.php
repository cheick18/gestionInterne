@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link text-secondary "  href="/payment">Espece</a>
  </li>
    <li class="nav-item">
      <a class="nav-link text-secondary "href="/virement">Virement</a>
    </li>
  </ul>
<h3 class="text-secondary">Cin de l'utilisateur concerné</h3>
<form method="get" action="">
    <div class="col-8">
        <div class="input-group mb-3 ">
            <input type="text" class="form-control"  name="key_word" value="{{ old('key_word') }}" required  autofocus>
            <button class="btn btn-outline-secondary " type="submit" id="button-addon2">Recherché</button>
            @error('key_word')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>
        
</form>
@if(request()->has('key_word'))
@php 
  $key_word = request()->input('key_word');
  $ins= new App\Models\Inscription();
  $ins=App\Models\Inscription::where('cin', $key_word)->first();

@endphp
@if((is_null($ins)))

<h5 class="text-secondary mb-2"> Etudiant non present</h5>
<img src="{{asset('images_empty.jpeg')}}" />
@else

<form method="POST" action="/paymentAnuelle/{{$ins->id}}" enctype="multipart/form-data">
  @csrf
  <!--
<nav class="mb-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><a href="/payment" class="block text-decoration-none text-dark"> </a></button>
     
    
    </div>
  
  </nav>
-->
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="col-6">
        <div class="mb-3">
              
            <select class="form-select" aria-label="Default select example" name="type">
              
                <option value="annuel" {{ old('type_paiement') == 'annuel' ? 'selected' : '' }}>Annuel</option>
                <option value="tranche" {{ old('type_paiement') == 'tranche' ? 'selected' : '' }}>Tranche</option>
        
              </select>
           
          </div>
          <div class="mb-3">
              
            <input type="text" class="form-control" id="montant" aria-describedby="montant" name="montant" placeholder="Montant à payer*" value="{{ old('montant') }}" required>
           
          </div>
          <!--
          <div class="mb-3">
           
            <input type="file" class="file-input" id="fileInput2"  name="recu" style="display: none">
            <label for="fileInput2">
              <i class="fas fa-cloud-upload-alt upload-icon"></i>
            </label>
            <span class="text-secondary">Recu de payment bancaire</span>
          </div>
        -->
          <!--
          
        -->
        <div class="col-12">
          <div class="accordion accordion-flush border" id="accordionFlushExample">
              @foreach($categories as $category)
              <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-heading-{{$category->id}}">
                      <button class="accordion-button collapsed text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{$category->id}}" aria-expanded="false" aria-controls="flush-collapse-{{$category->id}}">
                          {{$category->name_categorie}}
                      </button>
                  </h2>
                  <div id="flush-collapse-{{$category->id}}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{$category->id}}" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                          @foreach ($category->formations as $formation)
                          <div class="form-check">
                              <input class="form-check-input" type="radio" value="{{$formation->id}}" id="flexCheckDefault{{$formation->id}}" name="forme[]">
                              <label class="form-check-label" for="flexCheckDefault{{$formation->id}}">{{$formation->nom}}</label>
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      
          <div class="w-10 block mb-3 " style="visbility:hidden"></div>
      
          <button class="btn btn-danger ">Valider </button>
        </div>
      
    </div>
  

  </div>
</form>
@endif
@endif


<script>
  /*
  document.addEventListener('DOMContentLoaded', function() {
    const icon = document.querySelectorAll('.upload-icon');

    
      icon.addEventListener('click', function() {
        const associatedFileInput = icon.parentElement.querySelector('.file-input');
        associatedFileInput.click();
      });
  

  
  });
  */
</script>
  

@endsection