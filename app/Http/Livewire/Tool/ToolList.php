<?php

namespace App\Http\Livewire\Tool;

use App\Models\Client;
use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;

use Livewire\Component;
use Livewire\WithPagination;

class ToolList extends Component
{
    use WithPagination;

    public Tool $tool;
    public $selected='1';
    public $sortField='name';
    public $sortAsc=true;
    public $selected_kind='1';


    protected $listeners=[
        'ToolBack',
    ];


    public function mount(Tool $tool,Client $client)
    {
        Tool::where('duetime','<',now())
            ->where('condition_id','=',1)
            ->update(['condition_id'=>3]);
            /*->update(['condition_id'=>\DB::raw(3)]);*/
        Tool::where('duetime','>',now())
            ->update(['condition_id'=>1]);
            /*->update(['condition_id'=>\DB::raw(1)]);*/
        $this->tool=$tool;
        $this->client=$client;
    }

    public function render()
    {

        return view('livewire.tool.tool-list',[
            'tools'=>$this->tools,
            'conditions'=>Condition::all(),
            'kinds'=>Kind::all(),
        ]);
    }
    public function getToolsProperty()  /*computed property*/
    {
        return Tool::with(['latestRent','kind','condition','clients'])
            ->when($this->selected,function ($query){
                $query->where('condition_id',$this->selected);
            })
            ->when($this->selected_kind,function ($query){
                $query->where('kind_id',$this->selected_kind);
            })
            ->orderby($this->sortField, $this->sortAsc ? 'asc':'asc')
            ->paginate(20);
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

    public function ToolBack(Tool $tool)
    {
        $tool->clients()->attach(999,['state'=>0]);

        return redirect('/shop')->with('message','Tool returned succesfully');
    }


}
