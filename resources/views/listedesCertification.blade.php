
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
    
   
    </ul>
<h3 class="text-danger">Liste de toutes certifications</h3>
@php
    $formation = App\Models\listCertif::all();
@endphp

<div class="col table-responsive">
    <table class="table bg-white rounded shadow-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Identification</th> 
                <th scope="col">Nom de la formation</th>
              <!--  <th scope="col">Prix </th> -->
                <th scope="col">Modifier</th>  
                @if (Auth::user()->name==='admin')
                <th scope="col">Supprimer</th> 
            <!-- 
                <th scope="col">Détail</th>
          -->
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($formation as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->nom}}</td>
               <!-- <td>{{$form->prix}} DH</td> -->
                <td> 
                  <form action="/formeUpdate" method="post">
                    @csrf 
                   <input type="hidden" value="{{$form->id}}" name="id" required />
                  <button type="submit" class="btn btn-success ">Modifier</button>
              </form></td>
                
                @if (Auth::user()->name==='admin')
                <td>
                  <form action="deleteCertif/{{$form->id}}" method="post">
                    @csrf
                  
                  <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form></td>
                   <!-- 
                <td>
                    <form action="/detailcertif" method="post">
                        @csrf
                      <input type="hidden" value="{{$form->id}}" name="id" />
                        <button type="submit" class="btn btn-secondary ">Information</button>
                    </form>
                </td>
              -->
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection