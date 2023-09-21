@extends('layouts.dash')
@section('content')
@section('content')
<h3 class="text-secondary">Utilisateur concerné</h3>
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
@php
$inscrire=App\Models\Inscription::all();

@endphp
@if(request()->has('key_word'))
@php 
  $key_word = request()->input('key_word');
  $ins= new App\Models\Inscription();
  $ins = App\Models\Inscription::where(function ($query) use ($key_word) {
    $query->where('Nom', 'LIKE', '%' . $key_word . '%')
          ->orWhere('Prenom', 'LIKE', '%' . $key_word . '%')
          ->orWhere('cin', $key_word);
})->first();


@endphp


@if((is_null( $ins)))

<h5 class="text-secondary mb-2"> Etudiant non present</h5>
<img src="{{asset('images_empty.jpeg')}}" />

@else


<div class="row">
    <div class="col table-responsive">
     

        <table class="table rounded shadow-sm  table-hover border">
            <thead>
                <tr>
            
                  
                    <th scope="col">Module</th>
                    <th scope="col">Type</th> 
                    <th scope="col">Montant</th> 
                    <th scope="col">Recu</th> 
                    <th scope="col">Date</th>   
                  
                    
    
                </tr>
            </thead>

            <tbody >
                <h1 class="text-secondary" style="font-size: 3rem">{{$ins->Nom." "}}{{$ins->Prenom}}</h1>
                @forEach($ins->allformations as $user)
                <tr>
                    <td><h4>{{$user->nom}}</h4></td>
                   
                     
                         <td>
                            @forEach($user->allpymentbyinscrit as $pay)
                            @if($pay->inscriptions_id===$ins->id)
                            <p>{{$pay->type}}</p>
                            @endif
                            @endforeach
                         </td>
                         <td>
                            @forEach($user->allpymentbyinscrit as $pay)
                            @if($pay->inscriptions_id===$ins->id)
                            @if($pay->recu==null)
                            <p>{{$pay->montant}}</p>
                            @else
                            <p>Null</p>
                            @endif
                           
                            @endif
                            @endforeach
                         </td>
                         <td>
                            @forEach($user->allpymentbyinscrit as $pay)
                            @if($pay->inscriptions_id===$ins->id)
                            @if($pay->recu!==null)
                            <p><a href="{{ Storage::url($pay->recu)}}" class="text-decoration-none text-secondary"> Recu</a><p>
                             @else
                             <p>Null</p>
                            @endif
                          
                            @endif
                            @endforeach
                         </td>

                         
                         <td>
                            @forEach($user->allpymentbyinscrit as $pay)
                            @if($pay->inscriptions_id===$ins->id)
                            <p>{{$pay->created_at}}</p>
                            @endif
                            @endforeach
                         </td>
                         
                   
                </tr>
              
              
                @endforeach
             
            </tbody>

        </table>

    </div>
</div>
@endif
@else
<h1 class="">Tous les inscrits </h1>
<table class="table bg-white rounded shadow-sm  table-hover">
    <thead>
        <tr>
            
            <th scope="col">Cin</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Niveau</th> 
            <th scope="col">Specialite</th>   
           <th scope="col">Telephone</th>
         
            

        </tr>
    </thead>
    <tbody>
        @foreach ($inscrire as $users)
        <tr>
           <td>{{$users->CIN}}</td>
           <td>{{$users->Nom}}</td>
           <td>{{$users->Prenom}}</td>
           <td>{{$users->Niveau}} </td>
           <td>{{$users->Specialite}} </td>
           <td>{{$users->Telephone}} </td>
          
               
               
         
        </tr>
    
        @endforeach

    </tbody>
</table>
@endif
@endsection