@extends('layouts.layout')
@section('section')

<x-register.person.person-index 
    id="transport_companies" 
    title="{{__('strings.transport_companies')}}" 
    newRoute="register.transport-companies.new" 
    editRoute="register.transport-companies.edit" 
    deleteRoute="register.transport-companies.delete" 
    :rows="$rows"
    />

@stop