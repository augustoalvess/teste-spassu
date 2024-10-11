@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.professional_role')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 form-group">
                <x-common.fields.text-field id="description" label="{{__('strings.professional_role')}}" value="{{old('description') ?? $data->description ?? ''}}" required="true"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.checkbox-field id="active" label="{{__('strings.active')}}" :checked="old('active') ?? $data->active ?? true"></x-common.fields.checkbox-field>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <x-common.fields.textarea-field id="observation" label="{{__('strings.observation')}}" value="{{old('observation') ?? $data->observation ?? ''}}"></x-common.fields.textarea-field>
            </div>
        </div>

        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route('register.professional-role')}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop