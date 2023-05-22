<div class="py-8 space-y-4">
    <div class="max-w-7xl mx-auto"> {{--breedte van tabel, centreren op ruimte--}}

        <!--buttons-->
        <div>
            <div class="flex justify-between">
                {{--Search button--}}
                <div x-data="{isTyped: false}">
                    <input class="form-control
                                block w-full px-3 py-1.5 text-base font-normal text-gray-700
                                bg-white bg-clip-padding border border-solid border-gray-300
                                rounded transition ease-in-out m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           type="search" {{--overbodig--}}
                           name="search" {{--overbodig--}}
                           id="search" {{--overbodig--}}
                           x-ref="searchField"
                           x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                           placeholder='Search... Press / to focus'
                           autocomplete="off"
                           wire:model.debounce.500ms="search"
                           x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                           x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
                </div>
                {{--Selection button--}}
                <div x-data="{isTyped: false}" class="mb-3 w-1/4">
                    <select class="form-select appearance-none
                              block w-full px-3 py-1.5 text-base font-normal text-gray-700
                              bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                              rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"

                            wire:model="selectedCondition">

                        <option value="">Choose Condition...</option>
                        @foreach($conditions as $condition)
                            <option value="{{$condition->id}}">{{$condition->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--Selection button 2--}}
                <div class="mb-3 w-1/4">
                    <select class="form-select appearance-none
                              block w-full px-3 py-1.5 text-base font-normal text-gray-700
                              bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300
                              rounded transition ease-in-out m-0
                              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example"
                            wire:model="selectedKind">

                        <option value="">Choose Kind...</option>
                        @foreach($kinds as $kind)
                            <option value="{{$kind->id}}">{{$kind->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--With Checked tools--}}
                <div>
                    @if($checked)
                        <div class="flex justify-center">
                            <div>
                                <div class="dropdown relative">
                                    <button
                                        class="dropdown-toggle
                                        px-6 py-2.5 bg-gray-700 text-white font-medium text-xs leading-tight rounded shadow-md
                                        hover:bg-gray-800 hover:shadow-lg focus:bg-gray-800 focus:shadow-lg focus:outline-none focus:ring-0
                                        active:bg-gray-800 active:shadow-lg active:text-white
                                        transition duration-150 ease-in-out flex items-center whitespace-nowrap"
                                        type="button"
                                        id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        With Selected ({{count($checked)}})
                                        <svg
                                            aria-hidden="true"
                                            focusable="false"
                                            data-prefix="fas"
                                            data-icon="caret-down"
                                            class="w-2 ml-2"
                                            role="img"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 320 512"
                                        >
                                            <path
                                                fill="currentColor"
                                                d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"
                                            ></path>
                                        </svg>
                                    </button>
                                    <ul class="
                                          dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2
                                          list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none "
                                        aria-labelledby="dropdownMenuButton1"
                                    >
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="confirm('Nieuwe DueTime wordt ingesteld op +180 dagen')||stopImmediatePropagation()"
                                               wire:click="SetOk()"
                                            >Meting OK</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="Livewire.emit('openModal','date-input')"
                                            >Set detailed</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                  bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="confirm('Geselecteerde tools worden In Calibratie genomen')||stopImmediatePropagation();"
                                               wire:click="SetDue()"
                                            >In Calibration</a>

                                        </li>

                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                  bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               wire:click="$emit('openModal', 'tool.tool-new-due-time', )"
                                               {{--wire:click='$emit("openModal", "tool.tool-new-due-time")'--}}
                                               class="px-2 mx-2 rounded-md bg-gray-400 hover:bg-gray-600 text-gray-900 cursor-pointer"
                                            >Set New Due Time</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!--table-->
        <div class="flex flex-col ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full overflow-hidden rounded-md ">
                            <thead class="bg-gray-200 text-gray-800 ">
                            @foreach($checked as $tool)
                                {{$tool}}
                            @endforeach
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                               class="w-4 h-4  bg-gray-100 rounded border-gray-300 focus:ring-gray-200"
                                               wire:model="selectPage">
                                    </div>
                                </th>
                                <th></th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('name')">
                                    <a> Tool
                                        @include('includes._sort-icon',['field'=>'name'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('qrTool')">
                                    <a> QR code
                                        @include('includes._sort-icon',['field'=>'qrTool'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('duetime')">
                                    <a>Due Time
                                        @include('includes._sort-icon',['field'=>'duetime'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('kind_id')">
                                    <a>Kind
                                        @include('includes._sort-icon',['field'=>'kind_id'])
                                    </a>
                                </th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                    wire:click="sortBy('condition_id')">
                                    <a>Condition
                                        @include('includes._sort-icon',['field'=>'condition_id'])
                                    </a>
                                </th>
                                @can('role-edit')
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                                        wire:click="sortBy('company_id')">
                                        <a>Company
                                            @include('includes._sort-icon',['field'=>'company_id'])
                                        </a>
                                    </th>
                                    <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                                @endcan
                                <th></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($tools as $tool)
                                <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                    <td class="p-4 w-4">
                                        <input wire:model="checked" value="{{$tool->id}}" type="checkbox"
                                               class="w-4 h-4 rounded text-green-600 ">
                                    </td>
                                    <td><img class="px-2" src="{{asset('storage/img/'.$tool->kind->img)}}"
                                             style="height: 25px;width: auto"></td>

                                    <td class="px-6 mt-2 ">{{$tool->name}}</td>
                                    <td class="px-6 mt-2 ">{{$tool->qrTool}}</td>
                                    <td class="px-6 mt-2 ">{{ \Carbon\Carbon::parse( $tool->duetime ) }}</td>
                                    <td class="px-6 mt-2 ">{{$tool->kind->name}}</td>
                                    <td class="px-6 mt-2 ">{{$tool->condition->name}}</td>
                                    @can('role-edit')
                                        <td class="px-6 mt-2 ">{{$tool->company->name}}</td>
                                    @endcan

                                    <td class="flex justify-end mx-4 my-2">
                                        <!-- Inside existing Livewire component, single ' en wire:click -->
                                        @can('tool-edit')
                                            <button
                                                wire:click='$emit("openModal", "tool.tool-edit", {{json_encode(["tool" => $tool->id])}})'
                                                class="px-2 mx-2 rounded-md bg-gray-400 hover:bg-gray-600 text-gray-900 cursor-pointer">
                                                Edit
                                            </button>
                                        @endcan
                                        <!-- Inside existing Livewire component -->
                                        @can('tool-delete')
                                            <button
                                                wire:click='$emit("openModal", "tool.tool-delete", {{json_encode(["tool" => $tool->id])}})'
                                                class="px-2 rounded-md bg-red-400 hover:bg-red-600 text-gray-900 cursor-pointer">
                                                Delete
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <td class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100"
                                    colspan="8">
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
        {{$tools->links()}}
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
