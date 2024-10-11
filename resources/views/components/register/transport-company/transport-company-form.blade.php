@extends('layouts.layout')
@section('section')

<x-register.person.person-form
    title="{{__('strings.transport_company')}}" 
    route="{{$route}}" 
    backRoute="register.transport-companies" 
    :persontypes="$persontypes"
    :contributions="$contributions"
    :data="$data ?? ''">

    <h5 class="font-size-14 pt-4">{{__('strings.action')}}</h5>
    <div class="row">
        <div class="col-md-6 form-group">
            <x-common.fields.text-field id="action_region" label="{{__('strings.action_region')}}" value="{{old('action_region') ?? $data->action_region ?? ''}}"></x-common.fields.text-field>
        </div>
        <div class="col-md-6 form-group">
            <x-common.fields.multiselect-field id="transport_types" label="{{__('strings.transport_types')}}" :options="$transporttypes" :values="old('transport_types') ?? $data->transport_types_list ?? []"></x-common.fields.multiselect-field>
        </div>
    </div>

</x-register.person.person-form>

@stop
