@extends('layouts.layout')
@section('section')

<x-common.panels.page title="{{__('strings.product')}}">
    <form class="form-horizontal" action="{{$route}}" method="post" enctype="multipart/form-data">
        @csrf

        <x-common.panels.tab :tabs="[
            ['id' => 'general_product_data', 'title' => __('strings.general_data'), 'active' => true],
            ['id' => 'product_items', 'title' => __('strings.product_items')],
            ['id' => 'providers', 'title' => __('strings.providers')],
            ['id' => 'fiscal_product_data', 'title' => __('strings.fiscal_data')]
        ]">
            <x-common.panels.tab-item id="general_product_data" active="true">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.file-field id="photo" label="{{__('strings.product_photo')}}" accept=".jpg,.png" maxsize="524288" miniature="true" :file="old('photo') ?? $data->photo ?? ''"></x-common.fields.file-field>
                    </div>
                    <div class="col-md-9 form-group">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <x-common.fields.integer-field id="code" label="{{__('strings.code')}}" value="{{old('code') ?? $data->code ?? ''}}" disabled="true"></x-common.fields.integer-field>
                            </div>
                            <div class="col-md-4 form-group">
                                <x-common.fields.checkbox-field id="active" label="{{__('strings.active')}}" :checked="old('active') ?? $data->active ?? true"></x-common.fields.checkbox-field>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 form-group">
                                <x-common.fields.text-field id="description" label="{{__('strings.product')}}" value="{{old('description') ?? $data->description ?? ''}}" required="true"></x-common.fields.text-field>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <x-common.fields.text-field id="number" label="{{__('strings.internal_code')}}" value="{{old('number') ?? $data->number ?? ''}}"></x-common.fields.text-field>
                            </div>
                            <div class="col-md-4 form-group">
                                <x-common.fields.dropdown-field id="category_id" label="{{__('strings.category')}}" :options="$categories" value="{{old('category_id') ?? $data->category_id ?? ''}}"></x-common.fields.dropdown-field>
                            </div>
                            <div class="col-md-4 form-group">
                                <x-common.fields.select-field id="product_type" label="{{__('strings.product_type')}}" :options="$types" value="{{old('product_type') ?? $data->product_type ?? ''}}" :nullable="false"></x-common.fields.select-field>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.money-field id="unit_value" label="{{__('strings.unit_value')}}" value="{{old('unit_value') ?? $data->unit_value ?? ''}}"></x-common.fields.money-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.dropdown-field id="measure_unit_id" label="{{__('strings.measure_unit')}}" :options="$measureunits" value="{{old('measure_unit_id') ?? $data->measure_unit_id ?? '59'}}"></x-common.fields.dropdown-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.checkbox-field id="manage_stock" label="{{__('strings.manage_stock')}}" :checked="old('manage_stock') ?? $data->manage_stock ?? false"></x-common.fields.checkbox-field>
                    </div>
                </div>
                <div class="row stock_manager" style="display:none">
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="current_stock" label="{{__('strings.current_stock')}}" value="{{old('current_stock') ?? $data->current_stock ?? ''}}"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="minimum_stock" label="{{__('strings.minimum_stock')}}" value="{{old('minimum_stock') ?? $data->minimum_stock ?? ''}}"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="maximum_stock" label="{{__('strings.maximum_stock')}}" value="{{old('maximum_stock') ?? $data->maximum_stock ?? ''}}"></x-common.fields.decimal-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <x-common.fields.textarea-field id="observation" label="{{__('strings.observation')}}" value="{{old('observation') ?? $data->observation ?? ''}}"></x-common.fields.textarea-field>
                    </div>
                </div>
            </x-common.panels.tab-item>
            <x-common.panels.tab-item id="product_items">
                <x-common.tables.table-detail
                    id="product_items"
                    :columns="[
                        ['title' => __('strings.code'), 'field' => 'id', 'visible' => false],
                        ['title' => __('strings.description'), 'field' => 'description', 'required' => true, 'width' => '550'],
                        ['title' => __('strings.price'), 'field' => 'price'],
                        ['title' => __('strings.required'), 'field' => 'required'],
                        ['title' => __('strings.default'), 'field' => 'default']
                    ]" 
                    :rows="old('product_items') ?? $data->product_items ?? []">
                    <x-common.tables.table-detail-field :visible="false">
                        <x-common.fields.hidden-field id="id"></x-common.fields.hidden-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.tagselect-field id="description"></x-common.fields.tagselect-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.money-field id="price"></x-common.fields.money-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.checkbox-field id="required" :checked="true" :defaultvalue="true"></x-common.fields.checkbox-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.checkbox-field id="default" :checked="true" :defaultvalue="true"></x-common.fields.checkbox-field>
                    </x-common.tables.table-detail-field>
                </x-common.tables.table-detail>
            </x-common.panels.tab-item>
            <x-common.panels.tab-item id="providers">
                <x-common.tables.table-detail
                    id="product_providers"
                    :columns="[
                        ['title' => __('strings.code'), 'field' => 'id', 'visible' => false],
                        ['title' => __('strings.provider'), 'field' => 'provider_id', 'required' => true, 'width' => '350'],
                        ['title' => __('strings.product_ref_code'), 'field' => 'provider_code'],
                        ['title' => __('strings.purchasing_unit'), 'field' => 'purchasing_unit', 'required' => true],
                        ['title' => __('strings.purchasing_measure_unit'), 'field' => 'purchasing_measure_unit_id', 'required' => true],
                        ['title' => __('strings.purchasing_unit_price'), 'field' => 'unit_price', 'required' => true]
                    ]" 
                    :rows="old('product_providers') ?? $data->providers ?? []">
                    <x-common.tables.table-detail-field :visible="false">
                        <x-common.fields.hidden-field id="id"></x-common.fields.hidden-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.input-group>
                            <span class="input-group-prepend">
                                <x-common.fields.dropdown-field id="provider_id" :options="$providers"></x-common.fields.dropdown-field>
                            </span>
                            <span class="input-group-append">
                                <x-common.buttons.button-modal id="provider-add" title="{{__('strings.new')}}" label="Novo" class="btn btn-outline-success" icon="ri-add-circle-line">
                                    <h3>Formulário de cadastro de fornecedor</h3>
                                </x-common.buttons.button-modal>
                            </span>
                        </x-common.fields.input-group>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.text-field id="provider_code"></x-common.fields.text-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.decimal-field id="purchasing_unit"></x-common.fields.decimal-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.dropdown-field id="purchasing_measure_unit_id" :options="$measureunits"></x-common.fields.dropdown-field>
                    </x-common.tables.table-detail-field>
                    <x-common.tables.table-detail-field>
                        <x-common.fields.money-field id="unit_price"></x-common.fields.money-field>
                    </x-common.tables.table-detail-field>
                </x-common.tables.table-detail>
            </x-common.panels.tab-item>
            <x-common.panels.tab-item id="fiscal_product_data">
                <div class="row">
                    <div class="col-md-9 form-group">
                        <x-common.fields.dropdown-field id="icms_origin_id" label="{{__('strings.product_origin')}}" :options="$origins" value="{{old('icms_origin_id') ?? $data->icms_origin_id ?? ''}}"></x-common.fields.dropdown-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <x-common.fields.text-field id="bar_code_number" label="{{__('strings.bar_code_number')}}" value="{{old('bar_code_number') ?? $data->bar_code_number ?? ''}}" maxlength="14"></x-common.fields.text-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.text-field id="ncm" label="{{__('strings.ncm_code')}}" value="{{old('ncm') ?? $data->ncm ?? ''}}"></x-common.fields.text-field>
                    </div>
                    <div class="col-md-6 form-group">
                        <x-common.fields.text-field id="cest" label="{{__('strings.cest_code')}}" value="{{old('cest') ?? $data->cest ?? ''}}" placeholder="{{__('strings.cest_description')}}"></x-common.fields.text-field>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="net_weight" label="{{__('strings.net_weight')}}" value="{{old('net_weight') ?? $data->net_weight ?? ''}}" prefix="Kg"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="gross_weight" label="{{__('strings.gross_weight')}}" value="{{old('gross_weight') ?? $data->gross_weight ?? ''}}" prefix="Kg"></x-common.fields.decimal-field>
                    </div>
                </div>

                <h5 class="font-size-14 pt-4">{{__('strings.aliquotes')}}</h5>
                <div class="row">
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="icms_aliquot" label="{{__('strings.icms_aliquot')}}" value="{{old('icms_aliquot') ?? $data->icms_aliquot ?? ''}}" prefix="%"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="ipi_aliquot" label="{{__('strings.ipi_aliquot')}}" value="{{old('ipi_aliquot') ?? $data->ipi_aliquot ?? ''}}" prefix="%"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="pis_aliquot" label="{{__('strings.pis_aliquot')}}" value="{{old('pis_aliquot') ?? $data->pis_aliquot ?? ''}}" prefix="%"></x-common.fields.decimal-field>
                    </div>
                    <div class="col-md-3 form-group">
                        <x-common.fields.decimal-field id="cofins_aliquot" label="{{__('strings.cofins_aliquot')}}" value="{{old('cofins_aliquot') ?? $data->cofins_aliquot ?? ''}}" prefix="%"></x-common.fields.decimal-field>
                    </div>
                </div>
            </x-common.panels.tab-item>

        </x-common.panels.tab>
        
        <hr class='separator'>
        <x-common.buttons.button title="{{__('strings.save')}}" label="{{__('strings.save')}}" class="btn btn-primary waves-effect waves-light" icon="ri-save-3-line"></x-common.buttons.button>
        <x-common.buttons.button title="{{__('strings.back')}}" label="{{__('strings.back')}}" class="btn btn-secondary waves-effect waves-light" icon="ri-arrow-left-circle-line loading" type="button" href="{{route('register.products')}}"></x-common.buttons.button>
    </form>
</x-common.panels.page>

@stop
