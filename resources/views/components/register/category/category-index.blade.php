@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.categories')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('register.categories.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table 
        id="categories"
        idField="code"
        editRoute="register.categories.edit"
        deleteRoute="register.categories.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'code'],
            ['title' => __('strings.category'), 'field' => 'description'],
            ['title' => __('strings.parent_category'), 'field' => ['parent', 'description']],
            ['title' => __('strings.category_type'), 'field' => 'type', 'badges' => [
                \App\Domain\Register\Models\Category::CATEGORY_TYPE_PRODUCT => ['value' => __('strings.product'), 'type' => 'info'],
                \App\Domain\Register\Models\Category::CATEGORY_TYPE_SERVICE => ['value' => __('strings.service'), 'type' => 'success']
            ]],
            ['title' => __('strings.active'), 'field' => 'active', 'badges' => [
                false => ['value' => __('strings.no'), 'type' => 'danger'],
                true => ['value' => __('strings.yes'), 'type' => 'success']
            ]]
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop