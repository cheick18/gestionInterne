@extends('layouts.dash')
@section('content')
@php
$masters=App\Models\Master::all();
$inscrits=App\Models\Inscription::all();
                

@endphp

<h3 class="fs-4 mb-3" style="color: #E62E36">Tous les inscrits en master</h3>

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm  table-hover table-responsive">
        <thead>
            <tr>
                <th scope="col">Photo</th>
                <th>Nom</th>
                <th>Prenom</th>
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
               
              
                $user_name= App\Models\Inscription::where('master_id','=',$user->id)->first();
                
               
                @endphp
                 <td>   <div style="width: 60px;height:60px; border-radius:50%" class="bg-dark">
                    <img src="{{ Storage::url($user->photo)}}" class="img-fluid"  style="width: 100%;height:100%; border-radius:50%;object-fit:cover"/>
                   <!-- <a href="{{ Storage::url($user->photo)}}" class="text-decoration-none text-secondary" target="_blank"> Photo </a>
                   -->
               
                </div></td>
               <td>   @if(isset($user_name)&&!is_null($user_name)){{ $user_name->Nom}} @endif</td>
               <td>    @if(isset($user_name)&&!is_null($user_name)){{$user_name->Prenom}} @endif</td>
              
               <td><a href="{{ Storage::url($user->cin)}}" class="text-decoration-none text-secondary" target="_blank">Cin</a></td>
               <td><a href="{{ Storage::url($user->bac)}}" class="text-decoration-none text-secondary" target="_blank">Bac </a></td>
               <td> <a href="{{ Storage::url($user->lp)}}" class="text-decoration-none text-secondary" target="_blank">Licence</a></td> 
               <td> <a href="{{ Storage::url($user->attestation)}}" class="text-decoration-none text-secondary" target="_blank">Attestation</a> </td> 
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection