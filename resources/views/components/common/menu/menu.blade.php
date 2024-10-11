@props(['id', 'items' => []])

@if (count($items) > 0)
    <x-common.menu.sidebar-menu>
        @foreach ($items as $item)
            <x-common.menu.sidebar-menu-item :item="$item"/>
        @endforeach
    </x-common.menu.sidebar-menu>
@endif