<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Ontlener') }}
            </h2>
            {{--moet hier onclick zijn want is niet in livewire component--}}
            <div class="float-right">
                <x-button color="gray"
                              onclick="Livewire.emit('openModal', 'client.client-create')">
                    Maak nieuwe Ontlener
                </x-button>
            </div>
        </div>
    </x-slot>

    @livewire ('client.client-table')

</x-app-layout>
