<?php

namespace App\Http\Livewire\Settings;

use App\Models\Setting;
use LivewireUI\Modal\ModalComponent;

class SettingEdit extends ModalComponent
{
    public $name, $value, $settting_id;

    protected $listeners = [
        'SettingUpdate',
    ];

    public function render()
    {
        return view('livewire.settings.setting-edit');
    }

    public function mount(Setting $setting)
    {
        $this->setting = $setting;
        $this->settting_id = $setting->id;
        $this->name = $setting->name;
        $this->value = $setting->value;
    }

    public function SettingUpdate()
    {
        $validatedData = $this->validate();

        $this->setting->update($validatedData);

        session()->flash('message', 'Settings is Updated succesfully');
        return redirect()->to('/setting');

    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'value' => 'required',
        ];
    }


}
