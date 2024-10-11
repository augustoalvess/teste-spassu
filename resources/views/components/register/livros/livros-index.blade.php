@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.livros')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('livros.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table
        id="livros"
        idField="codl"
        editRoute="livros.edit"
        deleteRoute="livros.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'codl'],
            ['title' => __('strings.titulo'), 'field' => 'titulo'],
            ['title' => __('strings.editora'), 'field' => 'editora'],
            ['title' => __('strings.edicao'), 'field' => 'edicao'],
            ['title' => __('strings.anopublicacao'), 'field' => 'anopublicacao'],
            ['title' => __('strings.valor'), 'field' => 'valor']
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop
