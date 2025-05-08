
<x-layout>
    <x-slot name="leftSidebar">
        <x-sidebar
        :products="$products"
        :units="$units"
        :entries="$entries"
        />
    </x-slot>

    <x-slot name="main">
        <x-main
        :products="$products"
        :units="$units"
        :entries="$entries"
        />
    </x-slot>

    <x-slot name="pageBlock">
        <x-page-block />
    </x-slot>
</x-layout>




