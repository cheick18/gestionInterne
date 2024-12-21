@extends('layouts.dash')
@section('content')
@php
$stage=App\Models\Stage::all();
@endphp

<h3 class="fs-4 mb-3" style="color: #E62E36">Tous les documents des inscriptions en stage</h3>

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm  table-hover table-responsive">
        <thead>
            <tr>
        
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Cin</th>
                <th scope="col">Convention</th> 
                <th scope="col">Assurance</th>   
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($stage as $user)
            <tr>
                @php
               
              
                $user_name= App\Models\Inscription::where('stage_id','=',$user->id)->first();
               
                @endphp
                <td> @if(isset($user_name)&&!is_null($user_name)){{$user_name->Nom}} @endif</td>
                <td> @if(isset($user_name)&&!is_null($user_name)){{$user_name->Prenom}} @endif</td>
               <td><a href="{{ Storage::url($user->stage)}}" class="text-decoration-none text-secondary"> Cin du stagiaire</a></td>
               <td><a href="{{ Storage::url($user->convention)}}" class="text-decoration-none text-secondary">Convention</a></td>
               <td><a href="{{ Storage::url($user->assurance)}}" class="text-decoration-none text-secondary">Assurance</a></td>

              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection