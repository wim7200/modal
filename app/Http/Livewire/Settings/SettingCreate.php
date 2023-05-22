<?php

namespace App\Http\Livewire\Settings;


use App\Models\Setting;
use LivewireUI\Modal\ModalComponent;

class SettingCreate extends ModalComponent
{
    public $name, $value;

    protected $listeners = [
        'SettingCreate'
    ];

    public function render()
    {
        return view('livewire.settings.setting-create');
    }

    public function SettingCreate()
    {
        $this->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        Setting::Create([
            'name' => $this->name,
            'value' => $this->value,
        ]);

        session()->flash('message', 'Settings Created succesfully');
        return redirect()->to('/setting');
    }
}
