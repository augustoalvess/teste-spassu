@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'placeholder' => null, 'min' => 0, 'step' => 1, 'icon' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <input type="number" id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}" min="{{$min}}" step="{{$step}}" placeholder="{{$placeholder}}" class="form-control {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>
    @if ($icon) 
        <span class="{{$icon}}"></span> 
    @endif
</div>