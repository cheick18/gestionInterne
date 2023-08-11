@extends('layouts.dash')
@section('content')
<h3 class="text-secondary">Cin de l'utilisateur concerné</h3>
<form method="get" action="">
    <div class="col-6">
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

<form method="POST" action="/paymentAnuelle" enctype="multipart/form-data">
  @csrf
<nav class="mb-4">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><a href="/payment" class="block text-decoration-none text-dark">Effectuer un paiement </a></button>
     
    
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      <div class="col-6">
        <div class="mb-3">
              
            <select class="form-select" aria-label="Default select example" name="type">
              
                <option value="annuel" {{ old('type_paiement') == 'annuel' ? 'selected' : '' }}>Annuel</option>
                <option value="mensuel" {{ old('type_paiement') == 'mensuel' ? 'selected' : '' }}>Mensuel</option>
        
              </select>
           
          </div>
          <div class="mb-3">
              
            <input type="text" class="form-control" id="montant" aria-describedby="montant" name="montant" placeholder="Montant à payer*" value="{{ old('montant') }}" required>
           
          </div>
          <div class="col-8 col-xs-12">
            <div class="accordion accordion-flush border" id="accordionFlushExample">
              @foreach($categories as $category)
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed text-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                   {{$category->name_categorie}}
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    @foreach ($category->formations as $formation)
                    <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$formation->id}}" id="flexCheckDefault" name="forme[]">
                    <label class="form-check-label" for="flexCheckDefault">{{$formation->nom}}
                    </label>
                    
                  </div>
                  @endforeach
              
                </div>
                </div>
              </div>
              @endforeach
            
            </div>
          </div>
          <div class="w-10 h-9 " style="visbility:hidden"> hhh</div>
      
          <button class="btn btn-danger ">Payer</button>
        </div>
      
    </div>
  

  </div>
</form>
@endif
@endif



  

@endsection