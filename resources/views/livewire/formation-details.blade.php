<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <button wire:click="$set('isOpen', true)" class="btn btn-outline-info">Information</button>

    @if ($isOpen)
        <div class="modal fade show" style="display: block;">
          
            <table class="table rounded shadow-sm border">
                <thead>
                    <tr>
                        <th scope="col">Module</th>
                        <th scope="col">Nombre d'inscription</th> 
                        <th scope="col">Liste des inscrits</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><h4>{{$form->nom}}</h4></td>
                        <td>{{$form->allinscrit->count()}}</td>
                        <td>
                            @foreach($form->allinscrit as $user)
                            <p>{{$user->Nom." "}}{{$user->Prenom}}</p>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <button wire:click="$set('isOpen', false)" class="btn btn-secondary">Fermer</button>
        </div>
    @endif
</div>
