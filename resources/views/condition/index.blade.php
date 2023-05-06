<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Condition') }}
            </h2>
            <div class="float-right">
                <x-jet-button color="gray"
                          onclick="Livewire.emit('openModal', 'condition.condition-create')">
                    Create New Condition
                </x-jet-button>
            </div>
        </div>
    </x-slot>

    @livewire('condition.condition-table')

</x-app-layout>
