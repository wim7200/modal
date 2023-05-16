<x-app-layout>
    <x-slot name="header">
        <div class="">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Shop') }}
            </h2>
            <h1 class="italic">{{Auth::user()->company->name ?? 'No Company Selected'}}</h1>
        </div>
    </x-slot>

    @livewire ('tool.tool-list')

</x-app-layout>
