@props(['id', 'name' => null, 'values' => [], 'label' => null, 'class' => null, 'required' => false, 'disabled' => false, 'options' => [], 'nullable' => true])

@if ($label) 
    <label class="form-label mt-3">{{$label}} @if ($required) * @endif</label>
@endif
<select id="{{$id}}" name="{{$name ?? $id}}[]" class="form-control select2 select2-multiple {{$class}}" {{ $required ? 'required' : '' }} {{ $disabled ? 'readonly' : '' }} multiple="multiple" data-tags="true" data-placeholder="{{__('strings.select')}}">
    @if (count($options) > 0)
        @foreach ($options as $option)
            <option value="{{$option['value']}}" @if (in_array($option['value'], $values)) selected @endif>{{__($option['description'])}}</option>
        @endforeach            
    @endif
</select>