<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kind') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-w.bttn color="gray"
                      onclick="Livewire.emit('openModal', 'kind.kind-create')">
                Create New Kind
            </x-w.bttn>
        </div>
    </div>

    @livewire('kind.kind-table')

</x-app-layout>







