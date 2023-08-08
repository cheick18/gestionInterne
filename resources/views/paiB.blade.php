@extends('layouts.dash')
@section('content')
<h3 class="text-danger">Cin de l'utilisateur concerné</h3>
<!--
<form>
    <div class="col-6">
        <div class="input-group mb-3 ">
            <input type="text" class="form-control"  name="key_word" value="{{ old('key_word') }}" required  autofocus>
            <button class="btn btn-outline-primary " type="submit" id="button-addon2">Recherché</button>
            @error('key_word')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>
        
</form>
-->

<form method="POST" action="/pos">
  @csrf
<nav class="mb-3">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><a href="/payment" class="block text-decoration-none text-dark">Nouveau paiement </a></button>
      <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"> <a href="/autrepay" class="block text-decoration-none text-dark"> Completer paiment </a></button>
    
    </div>
  
   
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
        <div class="mb-3">
              
            <select class="form-select" aria-label="Default select example">
                <option selected>Type de paiment</option>
                <option value="1">Annuel</option>
                <option value="2">Mensuel</option>
              </select>
           
          </div>
          <div class="mb-3">
              
            <input type="text" class="form-control" id="montant" aria-describedby="montant" name="montant" placeholder="Montant à payer*" value="{{ old('montant') }}" required>
           
          </div>
      
    </div></div>
    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="col-6">
           
              <div class="mb-3">
                  
                <input type="text" class="form-control" id="montant" aria-describedby="montant" name="montant" placeholder="Montant à payer*" value="{{ old('montant') }}" required>
               
              </div>
         <button class="btn btn-primary">Payer</button>
            </div>
          
    </div>

  </div>
</form>




  

@endsection