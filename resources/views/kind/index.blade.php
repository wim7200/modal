<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Kind') }}
            </h2>
            <div class="float-right">
                @can('kind-create')
                    <x-jet-button color="gray"
                                  onclick="Livewire.emit('openModal', 'kind.kind-create')">
                        Create New Kind
                    </x-jet-button>
                @endcan
            </div>
        </div>
    </x-slot>

    @livewire('kind.kind-table')


</x-app-layout>







