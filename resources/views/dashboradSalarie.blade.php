
<!-- Content -->
@extends('layouts.dash')
@section('content')
@php
$inscrits=App\Models\Inscription::all();

@endphp
          
            
<div class="col">
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
            @foreach ($inscrits as $user)
            <tr>
               <td>{{$user->CIN}}</td>
               <td>{{$user->Nom}}</td>
               <td>{{$user->Prenom}}</td>
               <td>{{$user->Niveau}} </td>
               <td>{{$user->Specialite}} </td>
               <td>{{$user->Telephone}} </td>
                   
                   
             
            </tr>
        
            @endforeach

        </tbody>
    </table>
 @endsection
<!-- End content-->
      