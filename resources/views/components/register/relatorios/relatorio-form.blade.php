@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.relatorio_livros')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.generate_report')}}" label="{{__('strings.generate_report')}}" class="btn btn-primary waves-effect waves-light" icon="ri-bar-chart-2-line"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop