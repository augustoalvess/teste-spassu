@props(['type' => 'submit', 'title', 'id' => null, 'icon' => null, 'label' => null, 'class' => null, 'disabled' => false, 'href' => null, 'route' => null, 'idmodal' => null, 'onclick' => null, 'value' => null])

@if ($href || $route) <a href="{{$href ?? route($route)}}" class="{{ $disabled ? 'btn-disabled no-loading' : '' }}"> @endif
<button id="{{$id}}" type="{{$type}}" title="{{$title}}" {{ $disabled ? 'disabled' : '' }} class="{{$class}}" @if (!empty($idmodal)) data-bs-toggle="modal" data-bs-target="#{{$idmodal}}" @endif onclick="{{$onclick}}" value="{{$value}}">
    @if ($icon) <i class="{{$icon}} align-middle me-1"></i> @endif
    @if ($label) <span>{{$label}}</span> @endif
</button>
@if ($href || $route) </a> @endif