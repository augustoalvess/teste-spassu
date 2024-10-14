@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.livro')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <x-common.panels.tab :tabs="[
            ['id' => 'livro_info', 'title' => __('strings.livro_info'), 'active' => true],
            ['id' => 'livro_autores', 'title' => __('strings.autores')],
            ['id' => 'livro_assuntos', 'title' => __('strings.assuntos')]
        ]">
            <x-common.panels.tab-item id="livro_info" active="true">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.integer-field id="cod" label="{{__('strings.code')}}" value="{{old('cod') ?? $data->codl ?? ''}}" disabled="true"></x-common.fields.integer-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <x-common.fields.text-field id="titulo" label="{{__('strings.titulo')}}" value="{{old('titulo') ?? $data->titulo ?? ''}}" required="true"></x-common.fields.text-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <x-common.fields.text-field id="editora" label="{{__('strings.editora')}}" value="{{old('editora') ?? $data->editora ?? ''}}" required="true"></x-common.fields.text-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.integer-field id="edicao" label="{{__('strings.edicao')}}" value="{{old('edicao') ?? $data->edicao ?? ''}}" required="true"></x-common.fields.integer-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.text-field id="anopublicacao" label="{{__('strings.anopublicacao')}}" value="{{old('anopublicacao') ?? $data->anopublicacao ?? ''}}" required="true"></x-common.fields.text-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.money-field id="valor" label="{{__('strings.valor')}}" value="{{old('valor') ?? $data->valor ?? ''}}"></x-common.fields.money-field>
                    </div>
                </div>
            </x-common.panels.tab-item>
            <x-common.panels.tab-item id="livro_autores">
                <x-common.tables.table-detail
                    id="autores"
                    :columns="[
                        ['title' => __('strings.code'), 'field' => 'id', 'visible' => false],
                        ['title' => __('strings.autor'), 'field' => 'autor_codau', 'required' => true]
                    ]" 
                    :rows="old('autores') ?? $data->autores ?? []">
                    <x-common.tables.table-detail-field :visible="false">
                        <x-common.fields.hidden-field id="id"></x-common.fields.hidden-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.dropdown-field id="autor_codau" :options="$autores"></x-common.fields.dropdown-field>
                    </x-common.tables.table-detail-field>
                </x-common.tables.table-detail>
            </x-common.panels.tab-item>
            <x-common.panels.tab-item id="livro_assuntos">
                <x-common.tables.table-detail
                    id="assuntos"
                    :columns="[
                        ['title' => __('strings.code'), 'field' => 'id', 'visible' => false],
                        ['title' => __('strings.assunto'), 'field' => 'assunto_codas', 'required' => true]
                    ]" 
                    :rows="old('assuntos') ?? $data->assuntos ?? []">
                    <x-common.tables.table-detail-field :visible="false">
                        <x-common.fields.hidden-field id="id"></x-common.fields.hidden-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.dropdown-field id="assunto_codas" :options="$assuntos"></x-common.fields.dropdown-field>
                    </x-common.tables.table-detail-field>
                </x-common.tables.table-detail>
            </x-common.panels.tab-item>
        </x-common.panels.tab>
        
        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route('livros')}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop
