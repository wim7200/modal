<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use LivewireUI\Modal\ModalComponent;

class ClientCreate extends ModalComponent
{
    public $name;
    public $qrClient;
    public $company;

    protected $listeners=[
        'ClientCreate',
        ];

    public function render()
    {
        return view('livewire.client.client-create');
    }


    public function ClientCreate()
    {
        $this->validate([
            'name'=>'required',
            'qrClient'=>'required|unique:clients,qrClient',
            'company'=>'required',
        ]);

        Client::Create([
            'name'=>$this->name,
            'qrClient'=>$this->qrClient,
            'company'=>$this->company,
        ]);
        session()->flash('message', 'Client Created succesfully');
        return redirect()->to('/client');
    }
}
