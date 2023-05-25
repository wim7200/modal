<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Roles') }}
            </h2>
            <div class="float-right">
                <x-button color="gray"
                              onclick="Livewire.emit('openModal', 'role.role-create')">
                    Create New Role
                </x-button>
                <x-button
                    onclick="Livewire.emit('openModal', 'role.role-edit')">
                    Edit
                </x-button>
            </div>
        </div>
    </x-slot>

    @livewire('role.role-table')


</x-app-layout>







