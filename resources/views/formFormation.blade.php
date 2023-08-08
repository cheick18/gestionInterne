@extends('layouts.dash')
@section('content')
<h1 class="text-danger">Ajouter une formation</h1>
<div class="row">
    <div class="col">
        <div class="mb-3">
              
            <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Nom de la formation*" value="{{ old('name') }}" required>
           
          </div>

          <div class="mb-3">
              
            <select class="form-select" aria-label="Default select example" name="type">
              
                <option value="annuel" {{ old('type_paiement') == 'annuel' ? 'selected' : '' }}>Annuel</option>
                <option value="mensuel" {{ old('type_paiement') == 'mensuel' ? 'selected' : '' }}>Mensuel</option>
        
              </select>
           
          </div>
          <div class="mb-3">
              
            <input type="text" class="form-control" id="nom" aria-describedby="nom" name="nom" placeholder="Prix de la formation*" value="{{ old('name') }}" required>
           
          </div>
    </div>
</div>

@endsection