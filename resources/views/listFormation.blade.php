@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/liste_formations">Les formations</a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/add_formation">Nouvelle formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/inscrition_formation">Inscription à une formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/ajout_categori">Nouvelle categorie</a>
    </li>
</ul>

<form method="get" action="">
    <div class="col-12">
        <div class="row mb-2">
            <div class="col-4">
        <div class="input-group mb-3 ">
            <input type="text" class="form-control"  name="key_word" value="{{ old('key_word') }}" placeholder="Trouvez un formation">
            <button class="btn btn-outline-danger " type="submit" id="button-addon2">Recherché</button>
            @error('key_word')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        </div>
        </div>
        
</form>
@if(request()->has('key_word'))
@php 
  $key_word = request()->input('key_word');
  $formation = App\Models\Formations::query()
    ->where('nom', 'like', '%' . $key_word . '%')
  
    ->get();
    if($formation->isEmpty()){
       $cat=App\Models\Categories::where('name_categorie', $key_word)->first();
       if($cat==null)
       {
        $ins="null"; 
      
       }else
       $ins=App\Models\Formations::where('categories_id', $cat->id)->get(); 
    }
@endphp

@if($formation->isEmpty())
@if($ins==='null')
<h5 class="text-secondary mb-2"> Formation non presente dans la collection</h5>
<img src="{{asset('images_empty.jpeg')}}" />
@else
<div  class="col table-responsive">
    <table class="table bg-white rounded shadow-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Identification</th> 
                <th scope="col">Nom de la formation</th>
                <th scope="col">Categorie </th>
                <th scope="col">Prix </th>
                <th scope="col">Modifier</th>  
                @if (Auth::user()->name==='admin')
                <th scope="col">Supprimer</th>  
                <th scope="col">Détail</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($ins as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->nom}}</td>
             
                @php
                $cate= App\Models\Categories::find($form->categories_id);
               
                @endphp
                <td>{{$cate->name_categorie}}</td>
                <td>{{$form->prix}} DH</td>
                <td> 
                    <form  method="GET" action="/updateFormation/{{$form->id}}">
                    <button type="submit" class="btn btn-success">Modifier
                        </button></form>
                     </td>
                
                @if (Auth::user()->name==='admin')
                <td>
                  <form action="/delete/{{$form->id}}" method="GET">
                    @csrf
                  
                  <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form></td>
                <td>
                    <form action="" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <button type="button" class="btn btn-secondary open-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$form->id}}">Information</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif
@else
<div  class="col table-responsive">
    <table class="table bg-white rounded shadow-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Identification</th> 
                <th scope="col">Nom de la formation</th>
                <th scope="col">Categorie </th>
                <th scope="col">Prix </th>
                <th scope="col">Modifier</th>  
                @if (Auth::user()->name==='admin')
                <th scope="col">Supprimer</th>  
                <th scope="col">Détail</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($formation as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->nom}}</td>
             
                @php
                $cate= App\Models\Categories::find($form->categories_id);
               
                @endphp
                <td>{{$cate->name_categorie}}</td>
                <td>{{$form->prix}} DH</td>
                <td> 
                    <form  method="GET" action="/updateFormation/{{$form->id}}">
                    <button type="submit" class="btn btn-success">Modifier
                        </button></form>
                     </td>
                
                @if (Auth::user()->name==='admin')
                <td>
                  <form action="/delete/{{$form->id}}" method="GET">
                    @csrf
                  
                  <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form></td>
                <td>
                    <form action="" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <button type="button" class="btn btn-secondary open-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$form->id}}">Information</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@else


<h3 class="text-danger">Liste de toutes les formations</h3>
@php
    $formation = App\Models\Formations::all();

@endphp


<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Identification</th> 
                <th scope="col">Nom de la formation</th>
                <th scope="col">Categorie </th>
                <th scope="col">Prix </th>
                <th scope="col">Modifier</th>  
                @if (Auth::user()->name==='admin')
                <th scope="col">Supprimer</th>  
                <th scope="col">Détail</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($formation as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->nom}}</td>
             
                @php
                $cate= App\Models\Categories::find($form->categories_id);
               
                @endphp
                <td>{{$cate->name_categorie}}</td>
                <td>{{$form->prix}} DH</td>
                <td> 
                    <form  method="GET" action="/updateFormation/{{$form->id}}">
                    <button type="submit" class="btn btn-success">Modifier
                        </button></form>
                     </td>
                
                @if (Auth::user()->name==='admin')
                <td>
                  <form action="/delete/{{$form->id}}" method="GET">
                    @csrf
                  
                  <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form></td>
                <td>
                    <form action="" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <button type="button" class="btn btn-secondary open-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$form->id}}">Information</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@foreach ($formation as $form)
<div class="modal fade" id="staticBackdrop{{$form->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Détails de la formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table rounded shadow-sm border">
                    <thead>
                        <tr>
                            <th scope="col">Module</th>
                            <th scope="col">Nombre d'inscription</th> 
                            <th scope="col">Liste des inscrits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h4>{{$form->nom}}</h4></td>
                            <td>{{$form->allinscrit->count()}}</td>
                            <td>
                                @foreach($form->allinscrit as $user)
                                <p>{{$user->Nom." "}}{{$user->Prenom}}</p>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const openModalButtons = document.querySelectorAll(".open-modal");

        openModalButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                event.preventDefault();
                const targetModalId = button.getAttribute("data-bs-target");
                const targetModal = new bootstrap.Modal(document.querySelector(targetModalId));
                targetModal.show();
                targetModal._element.addEventListener("hidden.bs.modal", function () {
                    document.activeElement.blur();
                });
            });
        });
    });
</script>
@endsection
