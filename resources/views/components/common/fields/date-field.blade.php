@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'placeholder' => null, 'icon' => null])

@php
    if ($value == 'now')
        $value = date('Y-m-d');
@endphp
@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <input type="date" id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}" placeholder="{{$placeholder}}" class="form-control {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>
    @if ($icon) 
        <span class="{{$icon}}"></span> 
    @endif
</div>