@extends('layouts.layout')
@section('section')

<x-register.person.person-form
    title="{{__('strings.professional')}}" 
    route="{{$route}}" 
    backRoute="register.professionals" 
    :persontypes="$persontypes"
    :contributions="$contributions"
    :data="$data ?? ''">

    <!-- Professional extra fields -->
    <h5 class="font-size-14 pt-4">{{__('strings.professional_info')}}</h5>
    <div class="row">
        <div class="col-md-3 form-group">
            <x-common.fields.date-field id="admission_date" label="{{__('strings.admission_date')}}" value="{{old('admission_date') ?? $data->admission_date ?? ''}}"></x-common.fields.date-field>
        </div>
        <div class="col-md-3 form-group">
            <x-common.fields.date-field id="remove_date" label="{{__('strings.remove_date')}}" value="{{old('remove_date') ?? $data->remove_date ?? ''}}"></x-common.fields.date-field>
        </div>
        <div class="col-md-6 form-group">
            <x-common.fields.text-field id="remove_reason" label="{{__('strings.remove_reason')}}" value="{{old('remove_reason') ?? $data->remove_reason ?? ''}}"></x-common.fields.text-field>
        </div>
    </div>
    <div class="row">
        <x-common.tables.table-detail
            id="professional_functions"
            :columns="[
                ['title' => __('strings.code'), 'field' => 'id', 'visible' => false],
                ['title' => __('strings.unit_company'), 'field' => 'company_id', 'required' => true, 'width' => '350'],
                ['title' => __('strings.sector'), 'field' => 'sector_id', 'required' => true, 'width' => '300'],
                ['title' => __('strings.role'), 'field' => 'role_id', 'required' => true, 'width' => '300'],
                ['title' => __('strings.activities'), 'field' => 'activities', 'width' => '450']
            ]" 
            :rows="old('professional_functions') ?? $data->functions ?? []">
            <x-common.tables.table-detail-field :visible="false">
                <x-common.fields.hidden-field id="id"></x-common.fields.hidden-field>
            </x-common.tables.table-detail-field>
            <x-common.tables.table-detail-field>
                <x-common.fields.dropdown-field id="company_id" :options="$companies"></x-common.fields.dropdown-field>
            </x-common.tables.table-detail-field>
            <x-common.tables.table-detail-field>
                <x-common.fields.dropdown-field id="sector_id" :options="$sectors"></x-common.fields.dropdown-field>
            </x-common.tables.table-detail-field>
            <x-common.tables.table-detail-field>
                <x-common.fields.dropdown-field id="role_id" :options="$roles"></x-common.fields.dropdown-field>
            </x-common.tables.table-detail-field>
            <x-common.tables.table-detail-field>
                <x-common.fields.multiselect-field id="activities" :options="$activities"></x-common.fields.multiselect-field>
            </x-common.tables.table-detail-field>
        </x-common.tables.table-detail>
    </div>

</x-register.person.person-form>

@stop
