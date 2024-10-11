@props(['id', 'title', 'newRoute', 'editRoute', 'deleteRoute', 'rows' => [], 'columns' => []])

<x-common.panels.page title="{{$title}}">
    <x-common.tables.table-header>
        <x-common.tables.table-filter/>
        <div class="btn-group float-end" role="group">
            <x-common.buttons.button type="button" title="{{__('strings.new')}}" label="{{__('strings.new')}}" href="{{route($newRoute)}}" class="btn btn-success waves-effect waves-light loading" icon="ri-add-circle-line"></x-common.buttons.button>
        </div>
    </x-common.tables.table-header>
    <x-common.tables.table
        id="{{$id}}"
        idField="code"
        editRoute="{{$editRoute}}"
        deleteRoute="{{$deleteRoute}}"
        :rows="$rows"
        :columns="array_merge([
            ['title' => __('strings.code'), 'field' => 'code'],
            ['title' => __('strings.name'), 'field' => 'name'],
            ['title' => __('strings.cpfcnpj'), 'field' => 'cpf_cnpj'],
            ['title' => __('strings.state'), 'field' => ['city', 'state', 'name']],
            ['title' => __('strings.city'), 'field' => ['city', 'name']],
            ['title' => __('strings.neighborhood'), 'field' => 'neighborhood'],
            ['title' => __('strings.zipcode'), 'field' => 'zipcode'],
            ['title' => __('strings.res_phone'), 'field' => 'res_phone'],
            ['title' => __('strings.email'), 'field' => 'email']
        ], $columns)">
    </x-common.tables.table>
</x-common.panels.page>