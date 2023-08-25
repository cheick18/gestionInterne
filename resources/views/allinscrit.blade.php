@extends('layouts.dash')
@section('content')

@php
$inscrits=App\Models\Inscription::all();
$users=App\Models\User::all();
$u= $users->find(Auth::user()->id);




@endphp
<h3 class="fs-4 mb-3 text-danger">Liste de toutes les inscriptions</h3>

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
                
                <th scope="col">Cin</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Niveau</th> 
                <th scope="col">Specialite</th>   
               <th scope="col">Telephone</th>
               <th scope="col">Inscrits par</th>
              
               <th scope="col">Modifier</th>
               @if(Auth::user()->name==='admin')
               <th scope="col">Supprimer</th>
               @endif

            </tr>
          
        </thead>
        <tbody>
            @foreach ($inscrits as $user)
            <tr>
               <td>{{$user->CIN}}</td>
               <td>{{$user->Nom}}</td>
               <td>{{$user->Prenom}}</td>
               <td>{{$user->Niveau}} </td>
               <td>{{$user->Specialite}} </td>
               <td>{{$user->Telephone}} </td>
               <td>{{$users->find($user->user_id)->name}} </td>


             
               <td>
                <a href="/modif_inscription/{{$user->id}}">
                <button type="submit" class="btn btn-success">Modifier</button></a>
               </td>
               @if (Auth::user()->name==='admin')
               <td><form action="/delete/{{$user->id}}" method="post">
                @csrf
               
             
                    <button type="submit" class="btn btn-danger">Supprimer</button>
            
            </form>
            </td>
            @endif
                   
                   
             
            </tr>
        
            @endforeach

        </tbody>
    </table>
</div>
@endsection