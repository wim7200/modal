<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tool') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{--moet hier onclick zijn want is niet in livewire component--}}
            <div class="text-right italic">
                {!! $quote!!}</div>
            <x-w.bttn color="gray" onclick="Livewire.emit('openModal', 'tool.tool-create')">Create New Tool</x-w.bttn>

        </div>
    </div>

    @livewire ('tool.tool-table')

</x-app-layout>
{{--<button
               type="button"
               data-mdb-ripple="true"
               data-mdb-ripple-color="light"
               class="inline-block px-6 py-2.5
                   bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md
                   hover:bg-gray-500 hover:shadow-lg
                   focus:bg-gray-200 focus:shadow-lg focus:outline-none focus:ring-0
                   active:bg-gray-900 active:shadow-lg
                   transition duration-500 ease-in-out"

               onclick="Livewire.emit('openModal', 'tool.tool-create')">
               Create New Tool
           </button>--}}
