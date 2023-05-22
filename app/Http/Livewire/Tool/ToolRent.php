<?php

namespace App\Http\Livewire\Tool;

use App\Models\Client;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;
use LivewireUI\Modal\ModalComponent;


class ToolRent extends ModalComponent
{
    public $client_id, $tool_id, $info, $qrClient, $Client;
    public $search = '';

    protected $listeners = [
        'ToolRent',
    ];
    protected $rules = [
        'client_id' => 'required',
    ];

    public function render()
    {
        return view('livewire.tool.tool-rent', [
            /*'tools'=>Tool::all(),*/
            'clients' => Client::all()
        ]);
    }

    public function mount(Tool $tool)
    {
        $this->tool_id = $tool->id;
        $this->name = $tool->name;


    }

    public function ToolRent()
    {
        //$this->validate();

        $client = DB::table('clients')
            ->where('qrClient', '=', $this->qrClient)
            ->orWhere('name', '=', $this->qrClient)->pluck('id');

        $tool = Tool::find($this->tool_id);

        $tool->clients()->attach($client, ['state' => 1, 'info' => $this->info]);

        session()->flash('message', 'Tool Rented succesfully');
        return redirect()->to('/shop');

    }
}
