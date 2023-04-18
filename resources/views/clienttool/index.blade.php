<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historiek Overzicht') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

    <div class="grid grid-cols-1">
        <div>
            @foreach($tools as $tool)
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
                                Uit |||  {{$client->name}} ==>{{$client->pivot->created_at}}
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
            @endforeach
        </div>
    </div>
   </div>

   {{-- <div>
            @foreach($tools as $tool)
                <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                    {{$tool->name}}
                    @foreach($tool->lastupdated_clients as $client)
                        <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                            {{$client->name}} ==>
                            uit :{{$client->pivot->created_at}}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div>
            @foreach($tools as $tool)
                <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                    {{$tool->name}}
                    @foreach($tool->lastupdated_clients as $client)
                        <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                            {{$client->name}}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div>
            @foreach($clients as $client)
                <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                    {{$client->name}}
                    @foreach($client->toolsOut as $tool)
                        <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
                            {{$tool->name}}--{{$tool->pivot->state}}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>



    @foreach($tools as $tool)
        <div class="ml-6 text-2xl font-bold text-red-400 mt-5">
            tool name={{$tool->name}}
            @if ($tool->latestRent->state==1)
                 is uitgeleend aan {{$tool->latestRent->client_id}}
            @else
             is aanwezig {{$tool->latestRent->state}}
            @endif
        </div>
            @foreach($tool->clients as $client)
                <div class="ml-12 flex mt-5">
                    @if ($client->name !='admin' )
                    <div>{{$client->name}} --> </div>
                    <div> UIT :{{$client->pivot->created_at}}--></div>
                    @endif
                </div>
            @endforeach
    @endforeach




   {{-- <div class="py-4">
        <div class="max-w-7xl mx-auto"> --}}{{--breedte van tabel, centreren op ruimte--}}{{--
            <div class="">
                --}}{{--<div class="w-1/4 fex justify-between">
                    <div x-data="{isTyped: false}">
                        <input class="form-control
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               type="search"
                               name="search"
                               id="search"
                               x-ref="searchField"
                               x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                               placeholder='Search... Press / to focus'
                               autocomplete="off"
                               wire:model.debounce.500ms="search"
                               x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                               x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
                    </div>
                </div>--}}{{--

                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full overflow-hidden rounded-md">
                                <thead  class="bg-gray-200 text-gray-800 ">

                                </thead>

                                <tbody>
                                @forelse($users as $user)

                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                        <td class="px-6 mt-2 " >{{$tool->name}}</td>
                                        <td class="px-6 mt-2 " >{{$user->email}}</td>
                                        <td class="px-6 mt-2 " >{{$user->email_verified_at}}</td>
                                        <td class="px-6 mt-2 " >
                                            {{$user->roles->pluck('name')->implode('-')}}
                                        </td>

                                        <td>
                                            <div>@livewire('toggle-button', ['model' => $user, 'field' => 'notify'], key($user->id))</div>
                                        </td>

                                        <td>
                                            <div>@livewire('admin-button', ['model' => $user, 'field' => 'admin'], key($user->id))</div>
                                        </td>
                                        <td>

                                        </td>


                                        --}}{{--<td class="flex justify-end mx-4 my-2">
                                            <!-- Inside existing Livewire component-->
                                            <button wire:click='$emit("openModal", "user.user-edit", {{json_encode(["users" => $user->id])}})'
                                                    class="px-2 mx-2 rounded-md bg-gray-400 hover:bg-gray-600 text-gray-900 cursor-pointer">
                                                Edit
                                            </button>


                                            <!-- Inside existing Livewire component-->
                                            <button wire:click='$emit("openModal", "user.user-create", {{json_encode(["users" => $user->id])}})'
                                                    class="px-2 rounded-md bg-red-400 hover:bg-red-600 text-gray-900 cursor-pointer">
                                                Delete
                                            </button>
                                        </td>--}}{{--
                                    </tr>
                                @empty
                                    <td class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                                        colspan="7">
                                        <div class="flex items-center justify-center py-8 text-2xl text-gray-400">
                                            Sorry, No data found....
                                        </div>
                                    </td>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            --}}{{--{{$users->links()}}--}}{{--
            @if (session()->has('message'))
                <div class="bg-green-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                     role="alert"
                     x-data="{open: true}"
                     x-init="setTimeout(()=>(open=false),750)"
                     x-show="open"
                     x-transition:leave.duration.1000>
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>--}}

</x-app-layout>
