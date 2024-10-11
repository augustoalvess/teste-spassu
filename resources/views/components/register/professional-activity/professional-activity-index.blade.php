@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.professional_activities')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('register.professional-activities.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table 
        id="professional_activities"
        idField="code"
        editRoute="register.professional-activities.edit"
        deleteRoute="register.professional-activities.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'code'],
            ['title' => __('strings.professional_activity'), 'field' => 'description'],
            ['title' => __('strings.active'), 'field' => 'active', 'badges' => [
                false => ['value' => __('strings.no'), 'type' => 'danger'],
                true => ['value' => __('strings.yes'), 'type' => 'success']
            ]]
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop