@extends('layouts.dash')
@section('content')
<ul class="nav nav-pills">
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/liste_formations">Les formations</a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/add_formation">Nouvelle formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/inscrition_formation">Inscription à une formation</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-secondary " href="/ajout_categori">Nouvelle categorie</a>
    </li>
</ul>
<h3 class="text-danger">Liste de toutes les formations</h3>
@php
    $formation = App\Models\Formations::all();
@endphp

<div class="col">
    <table class="table bg-white rounded shadow-sm table-hover">
        <thead>
            <tr>
                <th scope="col">Identification</th> 
                <th scope="col">Nom de la formation</th>
                <th scope="col">Prix </th>
                <th scope="col">Modifier</th>  
                <th scope="col">Supprimer</th>  
                <th scope="col">Détail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formation as $form)
            <tr>
                <td>{{$form->id}}</td>
                <td>{{$form->nom}}</td>
                <td>{{$form->prix}} DH</td>
                <td> <a href="/updateFormation/{{$form->id}}"><button type="submit" class="btn btn-outline-primary">Modifier</button></a></td>
                <td>
                  <form action="/delete/{{$form->id}}" method="GET">
                    @csrf
                  
                  <button type="submit" class="btn btn-outline-danger">Supprimer</button>
                  </form></td>
                <td>
                    <form action="" method="GET">
                        @csrf
                        <input type="hidden" name="id" value="{{$form->id}}">
                        <button type="button" class="btn btn-outline-info open-modal" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$form->id}}">Information</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>