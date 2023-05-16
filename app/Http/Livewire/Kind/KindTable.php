<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;

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

}
