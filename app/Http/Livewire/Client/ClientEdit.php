<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use LivewireUI\Modal\ModalComponent;

class ClientEdit extends ModalComponent
{
    public $name;
    public $qrClient;
    public $company;
    public $client_id;

    protected $listeners = [
        'ClientUpdate',
    ];

    public function mount(Client $client)
    {
        $this->client = $client;
        $this->client_id = $client->id;
        $this->name = $client->name;
        $this->qrClient = $client->qrClient;
        $this->company = $client->company;
    }

    public function render()
    {
        return view('livewire.client.client-edit');
    }

    public function ClientUpdate()
    {
        $validatedData = $this->validate();

        /*Client::where('id',$this->client_id)->update([
            'name'=>$validatedData['name'],
            'qrClient'=>$validatedData['qrClient'],
            'company'=>$validatedData['company'],
        ]);*/

        $this->client->update($validatedData);

        session()->flash('message', 'Client Updated succesfully');
        return redirect()->to('/client');
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'qrClient' => 'required|unique:clients,qrClient' . $this->client->client_id,
            'company' => 'required',
        ];
    }
}
