@extends('layouts.dash')
@section('content')
@php
$licences=App\Models\Lp::all();

@endphp

<h3 class="fs-4 mb-3">Tous les inscriptions en licence</h3>

<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
        
                <th scope="col">Photo</th>
                <th scope="col">Cin</th>
                <th scope="col">Bac</th> 
                <th scope="col">Diplome</th>   
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($licences as $user)
            <tr>
                
               <td><a href="{{ Storage::url($user->photo_profil)}}" class="text-decoration-none text-secondary"> Photo </a></td>
               <td><a href="{{ Storage::url($user->cin_rv)}}" class="text-decoration-none text-secondary">Cin</a></td>
               <td><a href="{{ Storage::url($user->bac)}}" class="text-decoration-none text-secondary">Bac </a></td>
               <td> <a href="{{ Storage::url($user->diplome_bac)}}" class="text-decoration-none text-secondary">Licence</a></td> 
              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection