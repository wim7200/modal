<x-pmodal>
    <x-slot name="title">
        Edit <a class="text-red-500 fond-bold"> {{$condition->name}} </a>
    </x-slot>

    <x-slot name="content">
        <form>
            <label for="exampleFormControlInput1"
                   class="block text-gray-700 text-sm font-bold mb-2 ">name</label>
            <input type="text"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                   id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
        </form>
    </x-slot>

    <x-slot name="buttons">
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="$emit('ConditionUpdate')" type="button"
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


