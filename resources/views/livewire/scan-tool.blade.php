<div>
    <input class="form-control
                    block w-full px-3 py-1.5 text-base font-normal text-gray-700
                    bg-white bg-clip-padding border border-solid border-gray-300
                    rounded transition ease-in-out m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
           type="search"
           name="search"
           id="search"
           x-ref="searchField"
           x-on:input.debounce.100ms="isTyped = ($event.target.value != '')"
           placeholder='Search... Press / to focus'
           autocomplete="off"
           wire:model.debounce.500ms="search"
           x-on:keydown.window.prevent.slash="$refs.searchField.focus()"
           x-on:keyup.escape="isTyped = false; $refs.searchField.blur()">

</div>
