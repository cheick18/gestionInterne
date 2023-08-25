<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormationDetails extends Component
{
    public $formation;

    public function mount($formation)
    {
        $this->formation = $formation;
    }
    
    
    
    
    
    public function render()
    {
        return view('livewire.formation-details');
    }
}
