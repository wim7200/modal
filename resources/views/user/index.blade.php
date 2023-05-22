<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('User') }}
            </h2>
            <div class="italic text-sm text-right float-right">
                Logged in :{{Auth::user()->name}}
            </div>
        </div>
    </x-slot>

    @livewire ('user.user-table')

</x-app-layout>
