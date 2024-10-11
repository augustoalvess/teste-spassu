@extends('layouts.layout')
@section('section')

<x-register.person.person-index 
    id="customers" 
    title="{{__('strings.customers')}}" 
    newRoute="register.customers.new" 
    editRoute="register.customers.edit" 
    deleteRoute="register.customers.delete" 
    :rows="$rows"
    />

@stop