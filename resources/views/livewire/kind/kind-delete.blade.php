<x-modal>
    <x-slot name="title">
        Delete Kind
    </x-slot>

    <x-slot name="content">
        Bent u zeker dat <a class="text-red-500 fond-bold"> {{$kind->name}} </a> verwijderd mag worden?
    </x-slot>

    <x-slot name="buttons">
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="delete"
                                class="px-2 rounded-md bg-red-700 hover:bg-red-600 text-gray-900 cursor-pointer">
                            OK, delete Kind
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
</x-modal>
