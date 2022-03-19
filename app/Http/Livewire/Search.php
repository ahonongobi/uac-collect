<?php

namespace App\Http\Livewire;

use App\Models\partnerName;
use App\Models\TypePartenariat;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\String_;

class Search extends Component
{
    public $query = "";
    public $jobs = [];
    public String $selectedIndex = "";
    public $notSelect = true;

    public function addTodo($id, $name){
       $this->query = $name;
       $this->notSelect = false;
    }

    public function updatedQuery(){
        $words = "%". $this->query . "%";
        if(strlen($this->query) > 2){
            $this->jobs = partnerName::where('libelle', 'like', $words)->get();
        }
        $this->notSelect = true;
    }


    public function render()
    {

        return view('livewire.search');
    }
}
