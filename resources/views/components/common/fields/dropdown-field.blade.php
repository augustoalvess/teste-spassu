@props(['id', 'name' => null, 'value' => null, 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'options' => [], 'nullable' => true, 'nullOptionLabel' => __('strings.select')])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<select id="{{$id}}" name="{{$name ?? $id}}" class="form-control select2 {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }}>
    @if ($nullable)
        <option value="">{{$nullOptionLabel}}</option>
    @endif
    @if (count($options) > 0)
        @foreach ($options as $option)
            <option value="{{$option['value']}}" @if ($value == $option['value']) selected @endif>{{__($option['description'])}}</option>
        @endforeach            
    @endif
</select>