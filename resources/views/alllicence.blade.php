@extends('layouts.dash')
@section('content')
@php
$licences=App\Models\Lp::all();

@endphp

<h3 class="fs-4 mb-3 " style="color: #E62E36">Tous les documents des inscriptions en licence</h3>

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
                <th scope="col">Photo</th>
                
                  <th scope="col">Nom</th>
                  <th scope="col">Prenom</th>
                <th scope="col">Cin</th>
                <th scope="col">Bac</th> 
                <th scope="col">Diplome</th>   
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($licences as $user)
            <tr>
                @php
               
              
                $user_name= App\Models\Inscription::query('lp_id',$user->id)->first();
               
                @endphp
                  <td >
                    <div style="width: 60px;height:60px; border-radius:50%" class="bg-dark">
                   <img src="{{Storage::url($user->photo_profil)}}" class="img-fluid"  style="width: 100%;height:100%; border-radius:50%;object-fit:cover"/>
                 </div></td>
                <td class=" pt-4">{{$user_name->Nom}}</td>
                <td class="pt-4">{{$user_name->Prenom}}</td>
        
               <td class="pt-4"><a href="{{ Storage::url($user->cin_rv)}}" class="text-decoration-none text-secondary">Cin</a></td>
               <td class="pt-4"><a href="{{ Storage::url($user->bac)}}" class="text-decoration-none text-secondary">Bac </a></td>
               <td class="pt-4"> <a href="{{ Storage::url($user->diplome_bac)}}" class="text-decoration-none text-secondary">Licence</a></td> 
              
            </tr>
        
            @endforeach

        </tbody>
    </table>
</div>

@endsection