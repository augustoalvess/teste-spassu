@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.assuntos')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('assuntos.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table 
        id="assuntos"
        idField="codas"
        editRoute="assuntos.edit"
        deleteRoute="assuntos.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'codas'],
            ['title' => __('strings.descricao'), 'field' => 'descricao']
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop