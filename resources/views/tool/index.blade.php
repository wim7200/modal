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
