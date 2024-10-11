@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'placeholder' => null, 'minlength' => null, 'maxlength' => null, 'icon' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <input type="password" id="{{$name ?? $id}}" name="{{$id}}" value="{{$value}}" minlength="{{$minlength}}" maxlength="{{$maxlength}}" placeholder="{{$placeholder}}" class="form-control {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>
    @if ($icon) 
        <span class="{{$icon}}"></span> 
    @endif
</div>