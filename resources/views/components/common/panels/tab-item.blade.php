@props(['id', 'active' => false])

<div class="tab-pane @if ($active) active @endif" id="{{$id}}" role="tabpanel">
    {{$slot}}
</div>