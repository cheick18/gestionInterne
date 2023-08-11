@extends('layouts.dash')
@section('content')
@php
$stage=App\Models\Stage::all();

@endphp

<h3 class="fs-4 mb-3">Tous les inscriptions en licence</h3>

<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
        
              
                <th scope="col">Cin</th>
                <th scope="col">Convention</th> 
                <th scope="col">Assurance</th>   
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($stage as $user)
            <tr>
        
               <td><a href="{{ Storage::url($user->stage)}}" class="text-decoration-none text-secondary"> Cin du stagiaire</a></td>
               <td><a href="{{ Storage::url($user->convention)}}" class="text-decoration-none text-secondary">Convention</a></td>
               <td><a href="{{ Storage::url($user->assurance)}}" class="text-decoration-none text-secondary">Assurance</a></td>

              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection