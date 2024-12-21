@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link text-secondary "  href="/liste_certifications">Liste des certification</a>
    </li>
      <li class="nav-item">
        <a class="nav-link text-secondary "href="/add_certification">Nouvelle certification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-secondary "  href="/affectation_certification">Affectation à une certification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-secondary "  href="/paiementCertification">Payer certification</a>
      </li>
    
   
    </ul>

<h3 class="fs-4 mb-3 " style="color: #E62E36">Tous les documents des inscriptions pour certification</h3>
@php
               
$certif= App\Models\Certification::all();
@endphp
<div class="col">
    <table class="table bg-white rounded shadow-sm  table-hover">
        <thead>
            <tr>
        
                <th scope="col">Nom de l'inscrit</th>
                <th scope="col">Prenom de l'inscrit</th>
                <th scope="col">Nom de la certification</th>
                <th scope="col">Cin</th>
                 
              
                

            </tr>
        </thead>
        <tbody>
            @foreach ($certif as $user)
            <tr>
                <td>{{ $user->nomEtudiant}}</td>
                <td>{{ $user->prenomEtudiant}}</td>
            
                <td>{{ $user->nom}}</td>
               
        
               <td><a href="{{ Storage::url($user->cin)}}" class="text-decoration-none text-secondary" target="_blank"> Cin du stagiaire</a></td>
            
              
            </tr>
        
            @endforeach

        </tbody>
    </table>

@endsection