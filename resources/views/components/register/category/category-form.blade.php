@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.category')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-3 form-group">
                <x-common.fields.file-field id="photo" label="{{__('strings.category_photo')}}" accept=".jpg,.png" maxsize="524288" miniature="true" :file="old('photo') ?? $data->photo ?? ''"></x-common.fields.file-field>
            </div>
            <div class="col-md-9 form-group">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <x-common.fields.checkbox-field id="active" label="{{__('strings.active')}}" :checked="old('active') ?? $data->active ?? true"></x-common.fields.checkbox-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 form-group">
                        <x-common.fields.text-field id="description" label="{{__('strings.category')}}" value="{{old('description') ?? $data->description ?? ''}}" required="true"></x-common.fields.text-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 form-group">
                        <x-common.fields.select-field id="type" label="{{__('strings.category_type')}}" :options="$types" value="{{old('type') ?? $data->type ?? ''}}" :nullable="false"></x-common.fields.select-field>
                    </div>
                    <div class="col-md-4 form-group">
                        <x-common.fields.dropdown-field id="parent_category_id" label="{{__('strings.parent_category')}}" :options="$categories" value="{{old('parent_category_id') ?? $data->parent_category_id ?? ''}}"></x-common.fields.dropdown-field>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <x-common.fields.textarea-field id="observation" label="{{__('strings.observation')}}" value="{{old('observation') ?? $data->observation ?? ''}}"></x-common.fields.textarea-field>
            </div>
        </div>

        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route('register.categories')}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop
