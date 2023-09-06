@extends('layouts.dash')
@section('content')
<h1 class="text-danger"> Information relative à la certification</h1>
@php

@endphp
   

        <table class="table rounded shadow-sm  border">
            <thead>
                <tr>
            
                  
                    <th scope="col">Certification</th>
                   <th scope="col">Nombre d'inscription</th> 
                    <th scope="col">Liste des inscrits</th> 
                 
                    
    
                </tr>
            </thead>

            <tbody >
              
         
                <tr>
                    <td><h4>{{$formation->nom}}</h4></td>
                    <td><!--{{$formation->count()}} --></td>
                    <td>
                        <!--
                   
                    </td>
                 
                
                        
                         
                         
                   
                </tr>
              
              
           
             
            </tbody>

        </table>

    </div>


@endsection