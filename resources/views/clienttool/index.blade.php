<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historiek Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1">
                @foreach($tools as $tool)
                    @if ($tool->latestRent->state==1)
                        <div class="text-2xl font-bold">
                            <div class="mb-2">
                                {{$tool->name}}
                                @if ($tool->latestRent->state==1)
                                    <a class="text-red-600 italic">is uitgeleend</a>
                                @else
                                    <a class="text-green-700 italic">is aanwezig</a>
                                @endif
                            </div>
                            <div class="ml-6 mb-6">
                                @foreach($tool->clients as $client)
                                    <div class="text-right text-2xl font-bold text-red-400  ">
                                        @if ($client->name != 'admin')
                                            <div class="text-lg">
                                                Uit ||| {{$client->name}} ==>{{$client->pivot->created_at}}
                                            </div>
                                        @else
                                            <div class="text-left text-sm text-green-600">
                                                Binnengebracht => {{$client->pivot->created_at}}
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
