<div class="py-2">
    <div class="max-w-12xl p-4 mx-auto"> {{--breedte van tabel, centreren op ruimte--}}
        <!--buttons-->
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between">
                {{--Search button--}}
                <div class="form-check pb-5 px-2.5">
                    <input class="form-control
                        block w-80 px-3 py-1.5 text-base font-normal text-gray-700
                        bg-white bg-clip-padding border border-solid border-gray-300
                        rounded transition ease-in-out m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           type="search"
                           name="search"
                           id="search"
                           x-ref="searchField"
                           x-on:input.debounce.400ms="isTyped = ($event.target.value != '')"
                           placeholder='Scan QR tool to search...'
                           autocomplete="off"
                           wire:model.debounce.400ms="search"
                           x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
                           x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">
                </div>
                {{--Choose --}}
                <div class="hidden sm:flex w-1/3">
                    <div class="form-check pb-5 px-2.5">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-r-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" value="1" id="flexRadioDefault1"
                            wire:model="selected">
                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                            OK
                        </label>
                    </div>
                    <div class="form-check pb-5 px-2.5">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" value="3" id="flexRadioDefault1"
                            wire:model="selected">
                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                            calibratie
                        </label>
                    </div>
                    <div class="form-check pb-5 px-2.5">
                        <input
                            class="form-check-input appearance-none rounded-full h-4 w-4 border border-gray-300 bg-white checked:bg-green-500 checked:border-green-500 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="radio" value="" id="flexRadioDefault1"
                            wire:model="selected">
                        <label class="form-check-label inline-block text-gray-800" for="flexRadioDefault1">
                            all
                        </label>
                    </div>
                </div>
                {{--Choose kind--}}
                <div class="form-check hidden md:block w-1/3">
                    <select class="form-select appearance-none
                                  block w-full px-3 py-1.5 text-base font-normal text-gray-700
                                  bg-white bg-clip-padding border border-solid border-gray-300
                                  rounded transition ease-in-out m-0
                                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example"
                            wire:model="selected_kind">

                        <option value="">All</option>
                        @foreach($kinds as $kind)
                            <option value="{{$kind->id}}">{{$kind->name}}</option>
                        @endforeach
                    </select>
                </div>
                {{--With Checked tools--}}
                <div class="form-check pb-5 px-2.5">
                    @if($checked)
                        <div class="flex justify-center">
                            <div>
                                <div class="dropdown relative">
                                    <button
                                        class="dropdown-toggle
                                        px-3 py-2.5 bg-gray-700 text-white font-medium text-xs leading-tight rounded shadow-md
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
                                        @hasrole('admin')
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="confirm('Nieuwe DueTime wordt ingesteld op +180 dagen')||stopImmediatePropagation()"
                                               wire:click="SetOk()"
                                            >DueTime +180
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="Livewire.emit('openModal','date-input')"
                                            >Set detailed</a>
                                        </li>
                                        @endhasrole
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                  bg-transparent text-gray-700 hover:bg-gray-100"
                                               href="#"
                                               onclick="confirm('Geselecteerde tools worden In Calibratie genomen')||stopImmediatePropagation();"
                                               wire:click="SetDue()"
                                            >Put in Calibration</a>

                                        </li>
                                        <li>
                                            <a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap
                                                  bg-transparent text-gray-700 hover:bg-gray-100"
                                               wire:click="Deselect()"
                                            >Deselect</a>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>



        <div class="">
            @if($checked)geselecteerde tools :@foreach($checked as $tool) {{$tool}}@endforeach @endif
                <div class="grid grid-cols-2 sm:grid-cols-6 gap-2 lg:grid-cols-6 xl:grid-cols-10 ">

                <!--Cards-->

                @forelse($tools as $tool)
                    @php
                        $x=$tool->latestRent->state;
                        $t=\Carbon\Carbon::parse($tool->duetime)->isPast();/* if past ==>1*/
                        $s=(($tool->condition->name=='OK') ? 0: 1);/* if condition OK then 1*/
                        $u=$s*$t;
                        $state=$tool->latestRent->state;
                    @endphp
                        {{-----t={{$t}}--s={{$s}}--u={{$u}}----}}
                    <div @class([
                            'rounded overflow-hidden shadow-lg',
                            'bg-green-200'=>!$x,
                            'bg-red-200'=>$x,
                            'bg-green-200  '=>$t,
                            ])>

                <!--buttons-->
                            <div class="p-2">
                            <div class="flex justify-center">
                                <img class="mx-auto object-scale-down h-24 w-24 place-content-center" src="{{asset('storage/img/'.$tool->kind->img) ?? asset('storage/img/logo.jpg')}}" alt="No Pic">
                                <input wire:model="checked" value="{{$tool->id}}"  type="checkbox" class="w-4 h-4 rounded text-green-600 ">
                            </div>

                            <div class="font-bold text-xl mb-2 text-center">{{$tool->name}}</div>
                                <div class="font-bold text-sm mb-2 text-center">{{$tool->kind->name}}</div>

                                <div @class (['invisible'=>$u])>
                                    @if (($tool->latestRent->state)==false)
                                        <button
                                            class="bg-gray-200 font-serif hover:bg-green-500 hover:text-white rounded px-3 py-1 text-sm font-semibold text-gray-700 mb-2 w-full "
                                                wire:click='$emit("openModal", "tool.tool-rent", {{json_encode(["tool" => $tool->id])}})'>
                                            click to rent
                                        </button>
                                    @else
                                        <button class="font-serif bg-gray-200 hover:bg-red-500 hover:text-white rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 w-full"
                                                wire:click="ToolBack({{$tool->id}},'{{0}}')">
                                            Inleveren
                                        </button>
                                    @endif
                                </div>

                            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 h-16 w-full  text-center">
                                @if (($tool->latestRent->state)==0)
                                    Tool aanwezig
                                @else
                                    uitgeleend door:<br/>
                                    {{$client->find($tool->latestRent->client_id)->name}}
                                @endif
                            </div>

                            <div @class(['text-red-500'=>$s,'font-extrabold'=>$s])
                                class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2 w-full text-center">
                                {{$tool->condition->name}}<br/>
                            </div>

                            <div @class(['text-red-500'=>$t,'font-extrabold'=>$t])class="inline-block bg-gray-200 rounded px-3 py-1 text-sm text-gray-700 mr-2 mb-2 w-full text-center">
                                DueTime: <br/>
                                {{\Carbon\Carbon::parse($tool->duetime)->diffforHumans() }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex col-span-8 justify-center py-8 text-2xl text-gray-400">
                        Sorry, No data found....
                    </div>
                @endforelse
            </div>
        </div>

      {{$tools->links()}}
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 bg-green-200 px-4 py-3 shadow-md my-3"
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
