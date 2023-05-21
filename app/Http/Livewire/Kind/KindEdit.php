<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LivewireUI\Modal\ModalComponent;
use Livewire\WithFileUploads;
use File;

class KindEdit extends ModalComponent
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $name;
    public $photo;
    public $description;
    public $kind_id;
    public $UpdatedPhoto;



    protected $listeners=[
        'KindUpdate',
    ];

    protected function rules()
    {
        return [
            'name'=>'required',
            'description'=>'required',
            'UpdatedPhoto'=>'image',
        ];
    }

    public function mount (Kind $kind)
    {
        $this->kind=$kind;
        $this->Kind_id=$kind->id;
        $this->name=$kind->name;
        $this->description=$kind->description;
        //$this->photo=$kind->photo;
    }
    public function render()
    {
        $this->authorize('kind-edit');
        return view('livewire.kind.kind-edit');
    }

    public function KindUpdate0()
    {
        $validatedDate = $this->validate();


        if (!empty($this->photo)){
            $this->photo->store('public/img');
        }

        /*Kind::where('id',$this->kind_id)->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'img'=>$this->photo->hashname()
        ]);*/

        $this->kind->update($validatedDate);

        session()->flash('message', 'Kind Updated succesfully');
        return redirect()->to('/kind');
    }


    public function KindUpdate()
    {
        $this->validate([
            'name'=>'required',
        ]);

        if(is_null($this->UpdatedPhoto))
            {$filename=$this->kind->img;}
        if(!is_null($this->UpdatedPhoto))
        {   $filename=$this->UpdatedPhoto->store('public/img');
            $filename=basename($filename);
        }

        $this->kind->update([
            'name'=>$this->name,
            'description'=>$this->description,
            'img'=>$filename,
        ]);

        session()->flash('message', 'Kind Updated succesfully');
        return redirect()->to('/kind');
    }
}
