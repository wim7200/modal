<div class="py-4">
    <div class="max-w-7xl mx-auto"> {{--breedte van tabel, centreren op ruimte--}}
        <div class="">
            <div class="w-1/4 fex justify-between">
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
            </div>

            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full overflow-hidden rounded-md">
                            <thead class="bg-gray-200 text-gray-800 ">
                            <tr>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('name')">
                                    <a>Ontlener
                                        @include('includes._sort-icon',['field'=>'name'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('qrClient')">
                                    <a>QR code
                                        @include('includes._sort-icon',['field'=>'qrClient'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('company')">
                                    <a>Bedrijf
                                        @include('includes._sort-icon',['field'=>'company'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($clients as $client)

                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">

                                    <td class="px-6 mt-2 ">{{$client->name}}</td>
                                    <td class="px-6 mt-2 ">{{$client->qrClient}}</td>
                                    <td class="px-6 mt-2 ">{{$client->company}}</td>
                                    <td class="flex justify-end mx-4 my-2">

                                        <!-- Inside existing Livewire component -->

                                        <button
                                            wire:click='$emit("openModal", "client.client-edit", {{json_encode(["client" => $client->id])}})'
                                            class="px-2 mx-2 rounded-md bg-gray-400 hover:bg-gray-600 text-gray-900 cursor-pointer">
                                            Edit
                                        </button>

                                        <!-- Inside existing Livewire component -->
                                        @can('client-delete')
                                            <button
                                                wire:click='$emit("openModal", "client.client-delete", {{json_encode(["client" => $client->id])}})'
                                                class="px-2 rounded-md bg-red-400 hover:bg-red-600 text-gray-900 cursor-pointer">
                                                Delete
                                            </button>
                                        @endcan
                                    </td>
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
        {{$clients->links()}}
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
</div>
