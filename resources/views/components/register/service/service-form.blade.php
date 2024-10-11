@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.service')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-3 form-group">
                <x-common.fields.integer-field id="code" label="{{__('strings.code')}}" value="{{old('code') ?? $data->code ?? ''}}" disabled="true"></x-common.fields.integer-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <x-common.fields.text-field id="description" label="{{__('strings.service')}}" value="{{old('description') ?? $data->description ?? ''}}" required="true"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.checkbox-field id="active" label="{{__('strings.active')}}" :checked="old('active') ?? $data->active ?? true"></x-common.fields.checkbox-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 form-group">
                <x-common.fields.text-field id="number" label="{{__('strings.internal_code')}}" value="{{old('number') ?? $data->number ?? ''}}"></x-common.fields.text-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.dropdown-field id="category_id" label="{{__('strings.category')}}" :options="$categories" value="{{old('category_id') ?? $data->category_id ?? ''}}"></x-common.fields.dropdown-field>
            </div>
            <div class="col-md-3 form-group">
                <x-common.fields.money-field id="unit_value" label="{{__('strings.service_value')}}" value="{{old('unit_value') ?? $data->unit_value ?? ''}}"></x-common.fields.money-field>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <x-common.fields.textarea-field id="observation" label="{{__('strings.observation')}}" value="{{old('observation') ?? $data->observation ?? ''}}"></x-common.fields.textarea-field>
            </div>
        </div>
        
        <hr class='separator'>
        <x-common.buttons.button title="Salvar" label="Salvar" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="Voltar" label="Voltar" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="/registers/services"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop
