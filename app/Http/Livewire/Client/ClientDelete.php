<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use LivewireUI\Modal\ModalComponent;

class ClientDelete extends ModalComponent
{
    public $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.client.client-delete');
    }

    public function delete()
    {
        $this->client->delete();
        session()->flash('message', 'Client deleted!');
        return redirect()->to('/client');
    }
}
