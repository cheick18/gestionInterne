@extends('layouts.dash')
@section('content')
@php
$formatios=App\Models\Forma::all();

@endphp

<h3 class="fs-4 mb-3 text-danger">Tous les documents des inscriptions pour formation</h3>

<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
        
              
                <th scope="col">Cin</th>
                 
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($formatios as $user)
            <tr>
        
               <td><a href="{{ Storage::url($user->cin)}}" class="text-decoration-none text-secondary"> Cin du stagiaire</a></td>
            
              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection