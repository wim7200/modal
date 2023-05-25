<x-pmodal formAction="update">
    <x-slot name="title">
        Edit<a class="text-red-500 fond-bold"> {{$user->name}} </a>
    </x-slot>

    <x-slot name="content">
        <form>
            <label for="exampleFormControlInput1"
                   class="block text-gray-700 text-sm font-bold">name</label>
            <input type="text"
                   class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="exampleFormControlInput2"
                   class="block text-gray-700 text-sm font-bold ">Email</label>
            <input type="text"
                   class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="exampleFormControlInput2" placeholder="email" wire:model="email">
            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="exampleFormControlSelect1"
                   class="block text-gray-700 text-sm font-bold">Company</label>
            <select
                class="shadow appearance-none border rounded w-full text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="exampleFormControlInput2" placeholder="Company" wire:model="company_id">

                <option value="">Select a Company</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            @error('company_id') <span class="text-red-500">{{ $message }}</span>@enderror

            <label for="exampleFormControlSelect1"
                   class="block text-gray-700 text-sm font-bold">Role</label>

            <div class="col-span-12 sm:col-span-8">
                <div class="flex flex-wrap mt-1 justify-between px-3 w-full">
                    @foreach($roles as $key=>$role)
                        <div class="flex flex-wrap mr-3 mt-3 w-1/3">
                            <div class="flex">
                                <div class="1/4">

                                    <x-jet-input name="role" wire:model="selectedroles.{{$key}}" type="checkbox"/>
                                </div>
                                <div class="text-wrap 3/4">
                                    <x-jet-label class="ml-1 mt-0" for="{{$role}}" value="{{$role}}"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <label for="exampleFormControlSelect1"
                   class="block text-gray-700 text-sm font-bold">Notify Me</label>
            <td class="text-center">
                <div>@livewire('toggle-button', ['model' => $user, 'field' => 'notify'], key($user->id))</div>
            </td>


        </form>
    </x-slot>

    <x-slot name="buttons">
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click="$emit('saveUserWithRole')" type="button"
                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Update
                </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="$emit('closeModal')"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Nevermind
                </button>
            </span>
        </div>
    </x-slot>
</x-pmodal>


