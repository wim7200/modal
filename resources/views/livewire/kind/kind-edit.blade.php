<x-pmodal>
    <x-slot name="title">
        Edit <a class="text-red-500 fond-bold"> {{$kind->name}} </a>
    </x-slot>

    <x-slot name="content">
        <div class="pt-2">
            <div class="mb-4">
                <label for="exampleFormControlInput1"
                       class="block text-gray-700 text-sm font-bold mb-2">name</label>
                <input type="text"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">
                @error('name') <span class="text-red-500">{{ $message }}</span>@enderror

                <label for="exampleFormControlInput1"
                       class="block text-gray-700 text-sm font-bold mb-2">description</label>
                <input type="text"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                       id="exampleFormControlInput1" placeholder="Enter Name" wire:model="description">
                @error('description') <span class="text-red-500">{{ $message }}</span>@enderror

                <br/>
                <br/>

                @if($UpdatedPhoto)
                    <img src="{{$UpdatedPhoto->temporaryUrl()}}" class="rounded-full w-32 h-32 mx-auto shadow-md""
                @else
                    <div class="self-center justify-center flex relative">
                        <img src="{{ asset('storage/img/'.$kind->img) }}" alt=""
                             class="w-32 h-32 rounded-full shadow-md">
                        <label>
                            <i class="fas fa-pen cursor-pointer"></i>
                            <input name="UpdatedPhoto"
                                   type="file" wire:model.lazy="UpdatedPhoto" class="hidden"/>
                        </label>
                    </div>
                    @error('UpdatedPhoto')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div wire:loading wire:target="UpdatedPhoto" class="mx-auto text-xs">Uploading...</div>
                @endif
                <br/>
                <br/>
            </div>
        </div>
        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror

    </x-slot>

    <x-slot name="buttons">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click="$emit('KindUpdate')"
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
</x-pmodal>


