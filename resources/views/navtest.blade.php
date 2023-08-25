@extends('layouts.dash')
@section('content')
<div class="row g-3 my-2">
  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            @php
            $inscrits= App\Models\Inscription::count();
            @endphp
              <h3 class="fs-2">{{$inscrits}}</h3>
              <p class="fs-5  text-xs">les inscrits</p>
          </div>

          <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3  col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          <div>
            @php
               $montant= App\Models\Paiement::sum('montant');
            @endphp
              <h3 class="fs-2">{{$montant}}DH</h3>
              <p class="fs-5">Revenus</p>
          </div>
          <i
              class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
        @php
        $form= App\Models\Formations::count();
        @endphp
        
        <div>
              <h3 class="fs-2">{{$form}}</h3>
              <p class="fs-5">Formations</p>
          </div>
          <!--
          <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>-->
          <i class="fas fa-book-open fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>

  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
          
        @php
        $us= App\Models\User::count();
        @endphp
        <div>
              <h3 class="fs-2">{{$us}}</h3>
              <p class="fs-5">User</p>
          </div>
          <!--
          <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
        -->
          <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
      </div>
  </div>
<div class="h-20   block"></div>
@php               
              
$user= App\Models\User::all();
$inscrits= App\Models\Inscription::all();


@endphp

  <div class="col-md-6  col-xs-12 text-danger  shadow-sm p-3 mb-5 bg-body rounded">
    <table class="table border-0 ">
        
            <tr>
                <td class="">User</td>
              
                <td>mail</td>
                <td>Etudiant inscrits</td>
                <td>Modifier</td>
                <td>Supprimer</td>
            </tr>
            @foreach($user as $use)

            <tr>
                <td>{{$use->name}}</td>
                <td>{{$use->email}}</td>
                <td>
                    @foreach($use->inscrits as $inscrit)
                    <p>{{$inscrit->Nom." "}}{{$inscrit->Prenom}}</p>
                    @endforeach  
                </td>
                <td> 
                  <form action="/modif_user/{{$use->id}}" method="post">
                    @csrf
                   
                  <button type="submit" class="btn btn-success">Modifier</button>
                
                </form></td>
                <td>
                    <form action="/deleteUser/{{$use->id}}" method="post">
                          @csrf
                         
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                      
                      </form></td>
                    </tr>

            @endforeach
    </table>
  
  </div>
  <div class="col-1"></div>

  <div class="col-md-8 col-xs-12 card shadow-sm p-3 mb-5 bg-body rounded">
    <table class="table" >
        <tr>
           <th scope="col"> Nom</th>
            <th scope="col">Module</th>
            <th scope="col">Type</th> 
            <th scope="col">Montant</th> 
            <th scope="col">Date</th>   
          
        </tr>
  
        @forEach($inscrits as $ins)
          
        <tr class="">
           

            @forEach($ins->allformations as $user)
              <tr>  
                <td>{{$ins->Nom}}</td> 
                <td>{{$user->nom}}</td>
               
                 
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        <p>{{$pay->type}}</p>
                        @endif
                        @endforeach
                     </td>
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        <p>{{$pay->montant}}</p>
                        @endif
                        @endforeach
                     </td>
                     <td>
                        @forEach($user->allpymentbyinscrit as $pay)
                        @if($pay->inscriptions_id===$ins->id)
                        <p>{{$pay->created_at}}</p>
                        @endif
                        @endforeach
                     </td>
                    </tr>
                   
            @endforeach
     
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection