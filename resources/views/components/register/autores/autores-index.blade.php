@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.professional_roles')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('register.professional-role.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table 
        id="professional_roles"
        idField="code"
        editRoute="register.professional-role.edit"
        deleteRoute="register.professional-role.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'code'],
            ['title' => __('strings.professional_role'), 'field' => 'description'],
            ['title' => __('strings.active'), 'field' => 'active', 'badges' => [
                false => ['value' => __('strings.no'), 'type' => 'danger'],
                true => ['value' => __('strings.yes'), 'type' => 'success']
            ]]
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop