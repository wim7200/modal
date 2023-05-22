<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <div class="float-left">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('Tool') }}
                </h2>
                <h1 class="italic">{{Auth::user()->company->name ?? 'No Company Selected'}}</br></h1>
            </div>
            <div class="float-right">
                {{--moet hier onclick zijn want is niet in livewire component--}}
                @can('tool-edit')
                    <x-jet-button color="gray" onclick="Livewire.emit('openModal', 'tool.tool-create')">Create New
                        Tool
                    </x-jet-button>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-right italic">
            {!! $quote!!}</div>
    </div>


    @livewire ('tool.tool-table')

</x-app-layout>
