<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Condition') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-w.bttn color="gray"
                      onclick="Livewire.emit('openModal', 'condition.condition-create')">
                Create New Condition
            </x-w.bttn>
        </div>
    </div>

    @livewire('condition.condition-table')

</x-app-layout>
