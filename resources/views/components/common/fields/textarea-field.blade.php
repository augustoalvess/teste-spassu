@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'minlength' => null, 'maxlength' => null, 'rows' => 3, 'cols' => 50])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <textarea id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}" class="form-control {{$class}}" minlength="{{$minlength}}" maxlength="{{$maxlength}}" rows="{{$rows}}" cols="{{$cols}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>{{$value}}</textarea>
</div>