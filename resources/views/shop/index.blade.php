<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    {{--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button
                type="button"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                class="inline-block px-6 py-2.5 bg-gray-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700-700 hover:shadow-lg focus:bg-green-200 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                --}}{{--moet hier onclick zijn want is niet in livewire component--}}{{--
                onclick="Livewire.emit('openModal', 'tool.tool-create')">
                Create New Tool
            </button>
        </div>
    </div>--}}

    @livewire ('tool.tool-list')



</x-app-layout>
