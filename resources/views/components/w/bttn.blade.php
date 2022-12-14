@props([
    // primary, secondary
    'type' => 'primary',
    // tiny, small, regular, big
    'size' => 'tiny',
    // red, yellow, green, blue, black
    'color' => 'blue',
    'coloring' => [
        'bg' => [
            'red' => 'bg-red-500',
            'yellow' => 'bg-yellow-500',
            'green' => 'bg-emerald-500',
            'blue' => 'bg-blue-500',
            'gray'=>'bg-gray-600',
            'black' => 'bg-black',
        ],
        'focus' => [
            'red' => 'focus:ring-red-500',
            'yellow' => 'focus:ring-yellow-500',
            'green' => 'focus:ring-emerald-500',
            'blue' => 'focus:ring-blue-500',
            'gray'=>'focus:ring-gray-800',
            'black' => 'focus:ring-black',
        ],
        'hover_active' => [
            'red' => 'hover:bg-red-700 active:bg-red-700',
            'yellow' => 'hover:bg-yellow-700 active:bg-yellow-700',
            'green' => 'hover:bg-emerald-700 active:bg-emerald-700',
            'blue' => 'hover:bg-blue-700 active:bg-blue-700',
            'gray'=>'hover:bg-gray-700 active:bg-gray-800',
            'black' => 'hover:bg-black active:bg-black',
        ],
    ]
])

@php
    $primaryColor = $coloring['bg'][$color]. ' '. $coloring['focus'][$color]. ' '. $coloring['hover_active'][$color];
@endphp

<button
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    {{ $attributes->merge(['class' => "inline-block px-6 py-2.5
                    text-white font-medium text-xs leading-tight uppercase rounded shadow-md
                    $primaryColor
                    $size
                    hover:shadow-lg
                    focus:shadow-lg focus:outline-none focus:ring-0
                    active:shadow-lg
                    transition duration-400 ease-in-out"]) }}

>
    {{ $slot }}
</button>
