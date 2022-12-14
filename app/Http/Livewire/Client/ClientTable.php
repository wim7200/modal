<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientTable extends Component
{
    use WithPagination;


    public $name, $company;
    public $search ='';
    public $sortField='name';
    public $sortAsc=true;



    public function render()
    {
        return view('livewire.client.client-table',[
            'clients'=>Client::query()
                ->search($this->search,['name','qrClient','company'])
                ->orderby($this->sortField,$this->sortAsc? 'asc':'desc')
                ->paginate(10),
        ]);

    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }
}
