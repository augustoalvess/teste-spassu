@extends('layouts.layout')
@section('section')

<x-register.person.person-index 
    id="professionals" 
    title="{{__('strings.professionals')}}" 
    newRoute="register.professionals.new" 
    editRoute="register.professionals.edit" 
    deleteRoute="register.professionals.delete" 
    :rows="$rows"
    />

@stop