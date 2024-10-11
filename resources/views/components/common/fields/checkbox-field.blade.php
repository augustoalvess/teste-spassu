@props(['id', 'name' => null, 'value' => true, 'title' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'checked' => true, 'defaultvalue' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="form-check">
    <input type="hidden" id="{{$id}}" name="{{$name ?? $id}}" value="0"/>
    <input type="checkbox" id="{{$id}}" name="{{$name ?? $id}}" class="form-check-input {{$class}}" value="{{$value}}" defaultvalue="{{$defaultvalue}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }} {{ $checked ? 'checked' : '' }} style="cursor:pointer">
    @if ($title)
        <label class="form-check-label" for="{{$id}}">{!! $title !!}</label>
    @endif
</div>
