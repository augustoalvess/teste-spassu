@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'placeholder' => null, 'icon' => null])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input">
    <input type="numeric" id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}" placeholder="{{$placeholder}}" class="form-control input-mask text-left {{$class}}" data-inputmask="'numericInput': true, 'removeMaskOnSubmit': true, 'alias': 'numeric', 'radixPoint': ',', 'groupSeparator': '.', 'digits': 2, 'digitsOptional': false, 'prefix': '{{__('strings.monetary')}} ', 'placeholder': '0'" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }}>
    @if ($icon) 
        <span class="{{$icon}}"></span> 
    @endif
</div>