@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.autores')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('autores.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table 
        id="autores"
        idField="codau"
        editRoute="autores.edit"
        deleteRoute="autores.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'codau'],
            ['title' => __('strings.nome'), 'field' => 'nome']
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop