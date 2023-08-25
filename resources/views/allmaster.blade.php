@extends('layouts.dash')
@section('content')
@php
$masters=App\Models\Master::all();
$inscrits=App\Models\Inscription::all();
                

@endphp

<h3 class="fs-4 mb-3 text-danger">Tous les inscrits en master</h3>

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th scope="col">Photo</th>
                <th scope="col">Cin</th>
                <th scope="col">Bac</th> 
                <th scope="col">Licence</th>   
               <th scope="col">Attestation</th>
                

            </tr>
        </thead>
        <tbody>
            @foreach ($masters as $user)
           
            <tr>
                @php
               
              
                $user_name= App\Models\Inscription::query('master_id',$user->id)->first();
               
                @endphp
               <td>{{ $user_name->Nom}}</td>
               <td>{{$user_name->Nom}}</td>
               <td><a href="{{ Storage::url($user->photo)}}" class="text-decoration-none text-secondary"> Photo </a></td>
               <td><a href="{{ Storage::url($user->cin)}}" class="text-decoration-none text-secondary">Cin</a></td>
               <td><a href="{{ Storage::url($user->bac)}}" class="text-decoration-none text-secondary">Bac </a></td>
               <td> <a href="{{ Storage::url($user->lp)}}" class="text-decoration-none text-secondary">Licence</a></td> 
               <td> <a href="{{ Storage::url($user->attestation)}}" class="text-decoration-none text-secondary">Attestation</a> </td> 
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection