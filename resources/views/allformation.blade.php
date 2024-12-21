@extends('layouts.dash')
@section('content')
@php
$formatios=App\Models\Forma::all();
/*$inscrits=App\Models\Inscription::all();*/

@endphp

<h3 class="fs-4 mb-3" style="color: #E62E36">Tous les documents des inscriptions pour formation</h3>

<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
        
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Identification</th>
                <th scope="col">Cin</th>
                 
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($formatios as $user)
            <tr>
                @php
               
              
                $user_name= App\Models\Inscription::where('forma_id','=',$user->id)->first();
            
               
                @endphp
                
                <td>  @if(isset($user_name)&&!is_null($user_name)){{ $user_name->Nom}} @endif</td>
                <td>  @if(isset($user_name)&&!is_null($user_name)){{ $user_name->Prenom}}@endif</td>
                <td>  @if(isset($user_name)&&!is_null($user_name)){{ $user_name->CIN}} @endif</td>
        
               <td><a href="{{ Storage::url($user->cin)}}" class="text-decoration-none text-secondary" target="_blank"> Cin du stagiaire</a></td>
            
              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection