@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.assunto')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6 form-group">
                <x-common.fields.text-field id="descricao" label="{{__('strings.descricao')}}" value="{{old('descricao') ?? $data->descricao ?? ''}}" required="true"></x-common.fields.text-field>
            </div>
        </div>

        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route('assuntos')}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop