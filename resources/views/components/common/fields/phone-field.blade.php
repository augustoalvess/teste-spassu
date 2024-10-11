@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'placeholder' => null, 'minlength' => null, 'maxlength' => null, 'icon' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <input type="text" id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}" minlength="{{$minlength}}" maxlength="{{$maxlength}}" placeholder="{{$placeholder}}" class="form-control input-mask {{$class}}"  data-inputmask="'mask': '(99) 99999-9999'" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>
    @if ($icon) 
        <span class="{{$icon}}"></span> 
    @endif
</div>