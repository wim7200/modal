<?php

namespace App\Http\Livewire\Tool;

use App\Models\Client;
use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;

use Carbon\Carbon;
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
    public $checked=[];

    public $search='';

    protected $listeners=[
        'ToolBack',
        'DateInputEvent',
    ];

    public function mount(Tool $tool,Client $client)
    {
        $this->tool=$tool;
        $this->client=$client;
    }

    public function render()
    {
        return view('livewire.tool.tool-list',[
            'tools'=>$this->tools,
            'kinds'=>Kind::all(),
        ]);
    }

    public function getToolsProperty()  /*computed property*/
    {
        if ($this->search==""){
            return Tool::with(['latestRent', 'kind', 'condition', 'clients'])
                ->search($this->search, ['qrtool', 'name'])
                ->when($this->selected, function ($query) {
                    $query->where('condition_id', $this->selected);
                })
                ->when($this->selected_kind, function ($query) {
                    $query->where('kind_id', $this->selected_kind);
                })
                ->orderby($this->sortField, $this->sortAsc ? 'asc' : 'asc')
                ->paginate(20);
        }
        else{
            return Tool::with(['latestRent', 'kind', 'condition', 'clients'])
                ->search($this->search, ['qrtool', 'name'])
                ->paginate(20);
        }

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

    public function SetDue()
    {
        $yesterday=Carbon::yesterday()->toDateTimeString();
        Tool::whereKey($this->checked)->update([
            'duetime'=>$yesterday,
            'condition_id'=>'3'
        ]);
        $this->checked=[];
        $this->selectPage=FALSE;
    }

    public function SetOk()
    {
        $newtime=Carbon::now()->addDays(170);

        Tool::whereKey($this->checked)
            ->update(['condition_id'=>'1',
                'duetime'=>$newtime
            ]);
        $this->checked=[];
        $this->selected='1';
    }

    public function Deselect()
    {
        $this->checked=[];
    }

    public function DateInputEvent($date) //komt van andere LW component (als Event)
    {
        Tool::whereKey($this->checked)
            ->update(['condition_id'=>'1',
                'duetime'=>$date
            ]);
        $this->checked=[];
        $this->selected='1';

        session()->flash('message', 'DueTime Updated succesfully');
    }
}
