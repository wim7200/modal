<x-modal form-action="submit">
    <x-slot name="title">
        Edit <a class="text-red-500 fond-bold"></a>
    </x-slot>

    <x-slot name="content">
        <div class="flex flex-col my-8 space-y-1">
            @foreach($roles as $role)
                <div class="flex justify-between">
                    <label for="role-{{$role->name}}">{{$role->name}}</label>
                    <input class="rounded form-checkbox" id="role-{{$role->name}}"
                           type="checkbox" value="{{$role->id}}" wire:model.lazy="userRoles" />
                </div>
            @endforeach
        </div>
        <div>
            {{json_encode($userRoles)}}
        </div>
    </x-slot>

    <x-slot name="buttons">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click="$emit('submit')"
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
    </x-slot>


</x-modal>


