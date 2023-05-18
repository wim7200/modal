<?php

namespace App\Http\Livewire\Tool;

use App\Models\Kind;
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
    public $selectedCondition="";
    public $selectedKind="";
    public $checked=[];/*alle record die je wenst te wijzigen*/
    public $selectPage=false;


    public $duetime;

    protected $listeners=[
        'DateInputEvent'
    ];


    protected function rules(){
        return [
            //
        ];
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

    public function render()
    {
        return view('livewire.tool.tool-table',[
            'tools'=>$this->tools,
            'conditions'=>Condition::all(),
            'kinds'=>Kind::all(),
            ]);
    }

    public function getToolsProperty()  /*computed property*/
    {
        $role=auth()->user()->roles->pluck('name');

        $company_id=auth()->user()->company_id;



      //  $role == "admin"
      //      ? $company_id = "%%"
      //      : $company_id='5';

        //dd($company_id);

        return Tool::with('latestRent','kind','condition','clients')
            ->where('company_id','=',$company_id)
            ->when($this->selectedCondition,function ($query){
                $query->where('condition_id',$this->selectedCondition);
            })
            ->when($this->selectedKind,function ($query){
                $query->where('kind_id',$this->selectedKind);
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

    public function DateInputEvent($date)
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
