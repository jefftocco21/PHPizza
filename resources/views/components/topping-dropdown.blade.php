<div>
    <x-custom-drop>
        <x-slot name="trigger">
            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-35 text-left flex lg:inline-flex">
                {{ isset($currentTopping) ? ucwords($currentTopping->name) : 'Toppings' }}

                <x-arrow-down class="absolute pointer-events-none" />
            </button>
        </x-slot>
        <x-custom-drop-item href="/" :active="request()->routeIs('home')">All</x-custom-drop-item>

        <!--bind the display of this div to the truth value of the x-data div -->
        @foreach ($toppings as $topping)
            <x-custom-drop-item href="/?topping={{ $topping->slug }}"
                :active='request()->is("toppings/{$topping->slug}")'>{{ ucwords($topping->name) }}
            </x-custom-drop-item>
        @endforeach
    </x-custom-drop>
</div>
