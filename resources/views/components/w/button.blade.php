@props([
'type' => 'button',
// red, yellow, green, blue, purple, orange, cyan, black, slate
'color' => 'slate'
])

<button
    type="{{ $type }}"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    {{ $attributes->merge(['class' => 'inline-block px-6 py-2.5
                    bg-gray-700 text-white font-medium text-xs leading-tight uppercase rounded shadow-md
                    hover:bg-gray-500 hover:shadow-lg
                    focus:bg-gray-200 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-gray-900 active:shadow-lg
                    transition duration-400 ease-in-out'], ['data-mdb-ripple'=>'true']) }}

>
    {{ $slot }}
</button>
