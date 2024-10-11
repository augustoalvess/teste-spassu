@extends('layouts.layout')
@section('section')

<x-register.person.person-form
    title="{{__('strings.provider')}}" 
    route="{{$route}}" 
    backRoute="register.providers" 
    :persontypes="$persontypes"
    :contributions="$contributions"
    :data="$data ?? ''"
    />

@stop
