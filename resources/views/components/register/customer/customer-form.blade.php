@extends('layouts.layout')
@section('section')

<x-register.person.person-form 
    title="{{__('strings.customer')}}" 
    route="{{$route}}" 
    backRoute="register.customers" 
    :persontypes="$persontypes"
    :contributions="$contributions"
    :data="$data ?? ''"
    />

@stop
