@props(['label' => null, 'required' => false])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<div class="input-group bootstrap-touchspin">
    {{$slot}}
</div>