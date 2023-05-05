<div class="py-8">
    <div class="max-w-7xl mx-auto"> {{--breedte van tabel, centreren op ruimte--}}
        <div class="flex flex-col ">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full overflow-hidden rounded-md">
                                <thead  class="bg-gray-200 text-gray-800 ">
                                <tr>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left" >Name</th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left" >Value</th>
                                    <th  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($settings as $setting)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">


                                        <td class="px-6 mt-2 " >{{$setting->name}}</td>
                                        <td class="px-6 mt-2 " >{{$setting->value}}</td>
                                        <td class="flex justify-end mx-4 my-2">
                                            <!-- Inside existing Livewire component -->
                                            {{--<button wire:click='$emit("openModal", "kind.kind-edit", {{json_encode(["kind" => $kind->id])}})'
                                                    class="px-2 mx-2 rounded-md bg-gray-400 hover:bg-gray-600 text-gray-900 cursor-pointer">
                                                Edit
                                            </button>

                                            <!-- Inside existing Livewire component -->
                                            <button wire:click='$emit("openModal", "kind.kind-delete", {{json_encode(["kind" => $kind->id])}})'
                                                    class="px-2 rounded-md bg-red-400 hover:bg-red-600 text-gray-900 cursor-pointer">
                                                Delete
                                            </button>--}}
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        {{ $settings->links() }}
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
