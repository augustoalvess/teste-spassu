@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.products')}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route('register.products.new')}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table
        id="products"
        idField="code"
        editRoute="register.products.edit"
        deleteRoute="register.products.delete"
        :rows="$rows"
        :columns="[
            ['title' => __('strings.code'), 'field' => 'code'],
            ['title' => __('strings.product'), 'field' => 'description'],
            ['title' => __('strings.internal_code'), 'field' => 'number'],
            ['title' => __('strings.category'), 'field' => ['category', 'description']],
            ['title' => __('strings.product_type'), 'field' => 'product_type', 'badges' => [
                \App\Domain\Register\Models\Product::PRODUCT_TYPE_SIMPLE => ['value' => __('strings.product_type_simple'), 'type' => 'info'],
                \App\Domain\Register\Models\Product::PRODUCT_TYPE_KIT => ['value' => __('strings.product_type_kit'), 'type' => 'success'],
                \App\Domain\Register\Models\Product::PRODUCT_TYPE_RAW => ['value' => __('strings.product_type_raw'), 'type' => 'warning'],
                \App\Domain\Register\Models\Product::PRODUCT_TYPE_CONSUME => ['value' => __('strings.product_type_consume'), 'type' => 'danger']
            ]],
            ['title' => __('strings.unit_value'), 'field' => 'unit_value'],
            ['title' => __('strings.measure_unit'), 'field' => ['measure_unit', 'code']],
            ['title' => __('strings.stock_manager'), 'field' => 'manage_stock', 'badges' => [
                false => ['value' => __('strings.no'), 'type' => 'danger'],
                true => ['value' => __('strings.yes'), 'type' => 'success']
            ]],
            ['title' => __('strings.active'), 'field' => 'active', 'badges' => [
                false => ['value' => __('strings.no'), 'type' => 'danger'],
                true => ['value' => __('strings.yes'), 'type' => 'success']
            ]]
        ]">
    </x-common.tables.table>
</x-common.panels.page>

@stop
