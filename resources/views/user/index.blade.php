<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

{{--moet hier onclick zijn want is niet in livewire component--}}
            <x-w.bttn color="gray"
                      onclick="Livewire.emit('openModal', 'user.user-create')">
                Create New User
            </x-w.bttn>
        </div>
    </div>

   @livewire ('user.user-table')

</x-app-layout>
