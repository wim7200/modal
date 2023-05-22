<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use Livewire\Component;

class SettingTable extends Component
{
    public $name, $value;

    public function render()
    {
        return view('livewire.settings.setting-table',
            ['settings' => Setting::paginate(15)],
        );
    }
}
