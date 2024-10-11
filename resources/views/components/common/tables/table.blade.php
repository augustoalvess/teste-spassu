@props(["id", "columns" => [], "rows" => [], "actions" => [], "editRoute" => null, "deleteRoute" => null, "pagination" => true, "information" => true, "pageLength" => 10, "multiSelect" => false, "idField" => "id"])

@php
    $language = json_encode(__('datatables'));
    $delete_quest = __('strings.delete_quest');
    $delete = __('strings.delete');
    $cancel = __('strings.cancel');
    $id = str_replace("-", "_", $id);
    $defaults = [];
    if (!empty($editRoute)) {
        $defaults["edit"] = ['title' => __('strings.edit'), 'route' => $editRoute, 'id_field' => $idField, 'class' => 'btn btn-primary waves-effect waves-light loading', 'icon' => 'ri-edit-2-line'];
    }
    if (!empty($deleteRoute)) {
        $defaults["delete"] = ['title' => __('strings.delete'), 'route' => $deleteRoute, 'id_field' => $idField, 'class' => 'btn btn-danger waves-effect waves-light loading', 'icon' => 'ri-delete-bin-line', 'onclick' => $id . '_delete(this)'];
    }
    $actions = array_merge($actions, $defaults);
@endphp

<table id="{{ $id }}" class="table table-striped my-4 w-100 dataTable no-footer dtr-inline">
    <thead>
        <tr>
            @if (count($actions) > 0)
                <th style="min-width:95px; max-width:100px">{{__('strings.actions')}}</th>
            @endif
            @if ($multiSelect)
                <th class="no-sort">
                    <div class="form-check">
                        <input type="checkbox" id="check_all_{{ $id }}" name="check_all_{{ $id }}" class="form-check-input" style="cursor:pointer" onclick="{{$id}}_check_all(this)">
                    </div>                    
                </th>
            @endif
            @foreach ($columns as $column)
                <th width="@if (isset($column['width'])) {{$column['width']}} @endif">{{$column['title']}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @if (count($rows) > 0)
            @foreach ($rows as $i => $row)
                <tr>
                    @if (count($actions) > 0)
                        <td>
                        @foreach ($actions as $action)
                            <x-common.buttons.button type="button" id="{{$row[$action['id_field']]}}" title="{{$action['title']}}" href="{{!isset($action['onclick']) ? route($action['route'], [$action['id_field'] => $row[$action['id_field']]]) : ''}}" class="{{$action['class']}}" icon="{{$action['icon']}}" onclick="{{$action['onclick'] ?? ''}}"></x-common.buttons.button>
                        @endforeach
                        </td>
                    @endif
                    @if ($multiSelect)
                        <td>
                            <div class="form-check">
                                <input type="checkbox" id="check_{{ $id }}_{{ $i }}" name="check_{{ $id }}_{{ $i }}" value="{{$row[$action['id_field']]}}" class="form-check-input" style="cursor:pointer" onclick="{{$id}}_check(this)">
                            </div>                    
                        </td>
                    @endif
                    @foreach ($columns as $column)
                        @php
                            $value = "";
                            if (is_array($column['field'])) {
                                $value = $row;
                                foreach ($column['field'] as $field) {
                                    if (is_object($value)) {
                                        if (isset($value->$field)) {
                                            $value = $value->$field;
                                            continue;
                                        }
                                        $value = "";
                                    } else {
                                        if (isset($value[$field])) {
                                            $value = $value[$field];
                                            continue;
                                        }
                                        $value = "";
                                    }
                                }
                            } else {
                                if (isset($row[$column['field']]))
                                    $value = $row[$column['field']];
                                $datetime = \DateTime::createFromFormat('Y-m-d H:i:s', $value);
                                if ($datetime instanceof \DateTime) {
                                    $value = $datetime->format('d/m/Y H:i:s');
                                } else {
                                    $datetime = \DateTime::createFromFormat('Y-m-d', $value);
                                    if ($datetime instanceof \DateTime)
                                        $value = $datetime->format('d/m/Y');
                                }
                                if (is_numeric($value) && (int) $value !== $value)
                                    $value = number_format($value, 2, ',', '.');
                            }
                        @endphp
                        <td class="@if (isset($column['align'])) text-{{$column['align']}} @endif">
                            @if (isset($column['badges']) && count($column['badges']) > 0 && isset($column['badges'][$value]))
                                <x-common.component.badge id="{{$column['badges'][$value]['id'] ?? ''}}" value="{{$column['badges'][$value]['value'] ?? ''}}" type="{{$column['badges'][$value]['type'] ?? ''}}"></x-common.component.badge>
                            @elseif (isset($column['button']) && count($column['button']) > 0)
                                @php
                                    $id = $row[$action['id_field']] . "_" . preg_replace('/[^A-Za-z0-9_]/', '', str_replace(" ", "_", strtolower($column['title'])));
                                    $title = isset($column['button']['title']) ? $column['button']['title'] : null;
                                    $label = isset($column['button']['label']) ? $column['button']['label'] : null;
                                    $class = isset($column['button']['class']) ? $column['button']['class'] : 'btn btn-primary';
                                    $icon = isset($column['button']['icon']) ? $column['button']['icon'] : null;
                                    $href = isset($column['button']['href']) ? $column['button']['href'] . '/' . $value : null;
                                    $onclick = isset($column['button']['onclick']) ? $column['button']['onclick'] : null;
                                @endphp
                                <x-common.buttons.button id="{{$id}}" type="button" title="{{$title}}" label="{{$label}}" class="loading {{$class}} waves-effect waves-light" icon="{{$icon}}" href="{{$href}}" onclick="{{$onclick}}" value="{{$value}}"></x-common.buttons.button>
                            @else
                                {!!__($value)!!}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<script>
    $(document).ready(function() {
        {{$id}}_table = $("#{{$id}}").DataTable({
            dom: '<"table-responsive"t>ip',
            language: JSON.parse("{{$language}}".replace(/&quot;/g,'"')),
            pageLength: {{$pageLength}},
            paging: '{!!$pagination!!}',
            bInfo: '{!!$information!!}',
            order: [],
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });
    
        $('#tableSearch').keyup(function(){
            {{$id}}_table.search($(this).val()).draw();
        });
    });

    {{$id}}_check_all = function(bx) {
        $("#{{$id}} input:checkbox").prop("checked", bx.checked);
        if (bx.checked) {
            $(".btn-multi-action").prop("disabled", false);
            $(".btn-multi-action").parent().removeClass("btn-disabled no-loading");
        } else {
            $(".btn-multi-action").prop("disabled", true);
            $(".btn-multi-action").parent().addClass("btn-disabled no-loading");
        }
        {{$id}}_multi_actions();
    }

    {{$id}}_check = function(bx) {
        if (!bx.checked) {
            $("#check_all_{{$id}}").prop("checked", false);
        }
        if ($('#{{$id}} input:checkbox:checked').length > 0) {
            $(".btn-multi-action").prop("disabled", false);
            $(".btn-multi-action").parent().removeClass("btn-disabled no-loading");
        } else {
            $(".btn-multi-action").prop("disabled", true);
            $(".btn-multi-action").parent().addClass("btn-disabled no-loading");
        }
        {{$id}}_multi_actions();
    }

    {{$id}}_multi_actions = function() {
        $(".btn-multi-action").each(function() {
            var href = $(this).parent().prop("href");
            if (typeof href != "undefined") {
                var items = [];
                $('#{{$id}} input:checkbox:checked').each(function() {
                    items.push($(this).prop("value"));
                });
                var url = new URL(href);
                url.searchParams.set('itens', items.toString());
                $(this).parent().prop("href", url.toString());
            }
        });
    }

    @if (!empty($deleteRoute))
        {{$id}}_delete = function(btn) {
            Swal.fire({
                title: "{{$delete_quest}}",
                showCancelButton: true,
                confirmButtonText: "{{$delete}}",
                cancelButtonText: "{{$cancel}}",
            }).then((result) => {
                if (result.isConfirmed) {
                    let token = $("meta[name=csrf-token]");
                    console.log(token);
                    var form = document.createElement("form");
                    var route = "{{route($deleteRoute, [$idField => 'id'])}}";
                    $(form).attr("action", route.replace(/id([^id]*)$/, btn.id + '$1')).attr("method", "post");
                    $(form).html('<input type="hidden" name="_token" value="' + token.attr("content") + '" />');
                    document.body.appendChild(form);
                    $(form).submit();
                    document.body.removeChild(form);
                }
                $('#obscure-loading').fadeOut("slow");
            });
        }        
    @endif
</script>