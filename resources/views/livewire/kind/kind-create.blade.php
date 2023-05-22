<x-modal>
    <x-slot name="title">
        Create New Kind
    </x-slot>

    <x-slot name="content">
        <div class="pt-2">
            <div class="mb-4">
                <label for="exampleFormControlInput1"
                       class="block text-gray-700 text-sm font-bold mb-2">name</label>
                <input type="textarea"
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
                <input type="file" wire:model="photo">
                @if($photo)
                    <img src="{{$photo->temporaryUrl()}}"
                @endif
                <br/>
                <br/>
            </div>
        </div>
        @error('img') <span class="text-red-500">{{ $message }}</span>@enderror

    </x-slot>

    <x-slot name="buttons">
        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button wire:click="$emit('KindCreate')"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                Create
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


{{-- <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
 <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
     <div class="fixed inset-0 transition-opacity">
         <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
     </div>
     <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog" aria-modal="true" aria-labelledby="modal-headline">
         <form>
             <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                 <div class="border-b border-gray-200">
                     @if (empty($kind_id))
                         <a>Create  Kind</a>
                     @else
                         <a> Edit Kind</a>
                     @endif
                 </div>


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

                             <input type="file" wire:model="photo">
                             @if($photo)
                                 <img src="{{$photo->temporaryUrl()}}"
                             @endif

                         <br/>
                         <br/>
                     </div>
                 </div>
             </div>

             <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                 <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                      @if (empty($kind_id))
                         <button wire:click.prevent="store()" type="button"
                                 class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Store
                         </button>
                      @else
                         <button wire:click.prevent="store()" type="button"
                                 class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                    Update
                         </button>
                      @endif

                 </span>
                 <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                     <button wire:click="closeModalPopover()" type="button"
                             class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                         Nevermind
                     </button>
                 </span>
             </div>
         </form>
     </div>
 </div>
</div>--}}
