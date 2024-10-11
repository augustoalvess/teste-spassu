@props(['item'])

@php
    $active = isset($item->route) && $item->route != '/' && Request::is('*' . trim($item->route, '/') . '*');
@endphp

<li {{ $active ? 'class=mm-active' : '' }}>
    @if (empty($item->route) && count($item->sons) == 0)
        <li class="menu-title">{{__($item->title)}}</li>

    @else
        <a href="{{!empty($item->route) ? route($item->route) : 'javascript:void(0)'}}" class="waves-effect @if (count($item->sons) > 0)  has-arrow no-loading @endif {{ $active ? 'active mm-active' : '' }}">
            @if (!empty($item->icon))
                <i class="{{$item->icon}}"></i>
            @endif
            <span>{{__($item->title)}}</span>
        </a>
    @endif

    @if (count($item->sons) > 0)
        @foreach ($item->sons as $son)
            <ul class="sub-menu {{ $active ? 'mm-show' : '' }}" aria-expanded="false">
                <!-- Recursivo -->
                <x-common.menu.sidebar-menu-item :item="$son"/>
            </ul>
        @endforeach
    @endif
</li>