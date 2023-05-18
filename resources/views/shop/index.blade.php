<x-app-layout>
    <x-slot name="header">
        <div class="flow-root">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('Shop') }}
            </h2>
            <div>
                <p class="italic float-left">{{Auth::user()->company->name ?? 'No Company Selected'}} </p>
                <p class="italic float-right">Logged in : {{Auth::user()->roles->pluck('name')->implode(', ')}}</p>
            </div>
        </div>
    </x-slot>

    @livewire ('tool.tool-list')

</x-app-layout>
