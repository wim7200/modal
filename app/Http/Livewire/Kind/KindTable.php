<?php

namespace App\Http\Livewire\Kind;

use App\Models\Kind;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class KindTable extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;
    use WithPagination;


    public $name, $kind_id,$img,$description,$kind,$photo;


    public function render()
    {
        $this->authorize('kind-list');
        return view('livewire.kind.kind-table',[
            'kinds'=>Kind::paginate(10),
        ]);
    }

}
