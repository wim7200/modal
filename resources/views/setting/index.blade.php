<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Settings') }}
            </h2>
            <div class="float-right">
                <x-button color="gray"
                              onclick="Livewire.emit('openModal', 'settings.setting-create')">
                    Create New Setting
                </x-button>
            </div>
        </div>
    </x-slot>

    @livewire('settings.setting-table')

</x-app-layout>







