<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;

use Illuminate\Database\Eloquent\SoftDeletes;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KindTable extends Component
{
    use WithFileUploads;
    use WithPagination;


    public $name, $kind_id,$img,$description,$kind,$photo;


    public function render()
    {
        return view('livewire.kind.kind-table',[
            'kinds'=>Kind::paginate(10),
        ]);
    }

    /*public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->name='';
        $this->photo='';
        $this->description='';
        $this->id='';
        $this->kind_id='';


    }
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store()
    {
        $this->validate([
            'name'=>'required',
            'description'=>'required',
            //'img'=>'required',
        ]);


        if (!empty($this->photo)){
            $this->photo->store('public/img');
        }

        Kind::updateOrCreate (['id'=> $this->kind_id],[
            'name'=>$this->name,
            'description'=>$this->description,
            'img'=>$this->photo->hashname()
        ]);
        session()->flash('message', $this->kind_id ? 'Kind updated' : 'Kind Created');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }*/
   /* public function updatedPhoto()
    {
        $this->validate([
            'img' => 'image|max:1024',
        ]);
    }*/


    /*public function edit($id)

    {
        $kind = Kind::findOrFail($id);

        $this->kind_id=$id;
        $this->name=$kind->name;
        $this->description=$kind->description;

        $this->openModalPopover();
    }

    public function view($id)
    {
        $kind = Kind::findOrFail($id);

        $this->kind_id=$id;
        $this->name=$kind->name;
        $this->description=$kind->description;

        $this->openModalPopover();
    }


    public function delete ($id)
    {
        Kind::find($id)->delete();
        session()->flash('message','Kind deleted');
    }*/
}
