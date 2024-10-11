@extends('layouts.layout')
@section('section')

<x-register.person.person-index 
    id="providers" 
    title="{{__('strings.providers')}}" 
    newRoute="register.providers.new" 
    editRoute="register.providers.edit" 
    deleteRoute="register.providers.delete" 
    :rows="$rows"
    />

@stop