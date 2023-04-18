<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight float-left">
                {{ __('Tool') }}
            </h2>
            <div class="float-right">
                {{--moet hier onclick zijn want is niet in livewire component--}}
                <x-w.bttn color="gray" onclick="Livewire.emit('openModal', 'tool.tool-create')">Create New Tool</x-w.bttn>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-right italic">
            {!! $quote!!}</div>
    </div>


    @livewire ('tool.tool-table')

</x-app-layout>
