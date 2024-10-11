@props(['id', 'label' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}}</label>
@endif

<div id="{{$id}}" class="custom-accordion">
    {{$slot}}
</div>