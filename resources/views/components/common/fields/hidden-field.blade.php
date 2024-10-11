@props(['id', 'name' => null, 'value' => null])

<input type="hidden" id="{{$id}}" name="{{$name ?? $id}}" value="{{$value}}">