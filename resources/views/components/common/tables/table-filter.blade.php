@props(['id' => null])

<div class="btn-group" style="max-width:300px" role="group">
    <div class="input-group">
        <input id="tableSearch" type="text" class="form-control" placeholder="Procurar...">
        <span class="input-group-btn" style="margin-left:5px">
            <x-common.buttons.button-modal id="{{$id}}" title="Mais filtros" class="btn btn-info" icon="ri-filter-2-line" disabled="{{empty($id)}}">
                {{ $slot }}
            </x-common.buttons.button-modal>
        </span>
    </div>
</div>