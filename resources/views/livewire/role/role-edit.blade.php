<x-modal>
    <x-slot name="title">
        Edit <a class="text-red-500 fond-bold">{{$selectedrole}}</a>
    </x-slot>

    <x-slot name="content">

        <div class="col-span-12 sm:col-span-8">
            <select class="w-1/2" wire:model="selectedrole">
                <option value="">Select a Rol</option>
                @foreach($Roles as $role)
                    <option value="{{$role->id}}" >{{$role->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-12 sm:col-span-8 border-t border-b border-gray-300 p-3 ">
            <div class="flex justify-between">
                <div class="w-1/2">Available Permissions</div>
                <div class="flex justify-end w-1/2">
                    <div class="1/4">
                        <x-jet-input id="selectall" name="selectall" wire:model="checkall" type="checkbox" class="mt-1" />
                    </div>
                    <div class="text-wrap 3/4">
                        <x-jet-label class="ml-1 mt-0" for="selectall" value="Select All" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 sm:col-span-8">
            <div class="flex flex-wrap mt-1 justify-between px-3 w-full">
                @foreach($permissions as $key=>$permission)
                    <div class="flex flex-wrap mr-3 mt-3 w-1/3">
                        <div class="flex">
                            <div class="1/4">
                                <x-jet-input  name="rolepermissions" wire:model="selectedpermissions.{{$key}}"   type="checkbox" class="mt-1" />
                            </div>
                            <div class="text-wrap 3/4">
                                <x-jet-label class="ml-1 mt-0" for="{{$permission}}" value="{{$permission}}" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </x-slot>

    <x-slot name="buttons">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click="$emit('saveRolePermissions')"
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


