<?php

namespace App\Http\Livewire\Tool;

use App\Models\Condition;
use App\Models\Tool;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class  ToolTable extends Component
{
    use WithPagination;

    public $search ='';
    public $sortField='name';
    public $sortAsc=true;
    public $selected="";
    public $checked=[];/*alle record die je wenst te wijzigen*/
    public $selectPage=false;



    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        return view('livewire.tool.tool-table',[
            'tools'=>$this->tools,
            'conditions'=>Condition::all(),
            ]);
    }

    public function getToolsProperty()  /*computed property*/
    {
        return Tool::with('latestRent','kind','condition','clients')
            ->when($this->selected,function ($query){
                $query->where('condition_id',$this->selected);
            })
            ->search ($this->search,['name','qrtool','kind.name','condition.name'])
            ->orderby($this->sortField, $this->sortAsc ? 'asc':'desc')
            ->paginate(20);
    }

    public function updatedSelectPage($value){
        if($value){
            $this->checked=$this->tools->pluck('id')->toArray();
        }else{
            $this->checked=[];
        }
    }
    public function SetOk()
    {
        $newtime=Carbon::now()->addDays(170);

        Tool::whereKey($this->checked)
            ->update(['condition_id'=>'1',
                'duetime'=>$newtime
            ]);
        $this->checked=[];
        $this->selectPage=FALSE;
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

}
