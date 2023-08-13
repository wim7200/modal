<div x-data="{
            highlighted:0,
            count:{{count($items)}},
            next() {
                this.highlighted = (this.highlighted + 1) % this.count;
              },
              previous() {
                this.highlighted = (this.highlighted + this.count - 1) % this.count;
              },
              select() {
                this.$wire.call('select', this.highlighted)
              }
     }"
     x-init="highlighted =  {{ $selected ? : 0 }}"
     close() {
        if (this.$wire.open) {
            this.$wire.open = false;
        }
     }
     @click.outside="close()"
>

    <div>Success is as dangerous as failure</div>

    <label class="text-green-600">
        {{$label}}
    </label>
    <div class="relative">
        <button
            wire:click="toggle"
            class="w-1/4 flex items-center h-12 bg-gray-400 rounded-lg"
            @keydown.arrow-down="next()"
            @keydown.arrow-up="previous()"
            @keydown.enter.prevent="select()"
        >
            @if ($selected!==null)
                {{$items[$selected]}}
            @else
            Choose....
            @endif
        </button>
        @if($open)
            <ul class="bg-white absolute mt-2 z-10 border rounded-lg w-1/4 ">
                @foreach($items as $item)
                    <li wire:click="select({{$loop->index}})"
                        x-data="{ index: {{ $loop->index }} }"
                        class="px-3 py-2 cursor-pointer flex items-center justify-between"
                        :class="{'bg-blue-400 text-white': index === highlighted}"
                        @mouseover="highlighted = index"
                    >
                        {{$item}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
