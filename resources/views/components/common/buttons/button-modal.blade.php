@props(['id', 'title', 'icon' => null, 'label' => null, 'class' => null, 'disabled' => false])

<x-common.buttons.button type="button" title="{{$title}}" label="{{$label}}" class="{{$class}}" icon="{{$icon}}" idmodal="{{$id}}" disabled="{{$disabled}}"></x-common.buttons.button>

<x-common.panels.modal id="{{$id}}" title="{{$title}}">
    {{$slot}}
</x-common.panels.modal>