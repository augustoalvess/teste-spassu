@props(["id", "columns" => [], "rows" => []])

@php
    $id = str_replace("-", "_", $id);
@endphp

<table id="{{$id}}" class="table table-striped my-4 w-100 dataTable no-footer dtr-inline">
    <thead>
        <tr>
            @foreach ($columns as $column)
                <th width="@if (isset($column['width'])) {{$column['width']}} @endif" style="{{isset($column['visible']) && !$column['visible'] ? 'display:none' : ''}}">{{$column['title']}} @if (isset($column['required']) && $column['required']) * @endif</th>
            @endforeach
            <th class="tfields-actions">{{__('strings.actions')}}</th>
        </tr>
        <tr id="tfields-{{$id}}">
            {{$slot}}
            <td id="tfields-actions-{{$id}}">
                <button type="button" title="{{__('strings.add')}}" class="btn btn-success" onclick="{{$id}}_add()">
                    <i class="ri-check-line align-middle me-1"></i>
                </button>
            </td>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@php
    $cols = json_encode($columns);
    $data = '{}';
    if (count($rows) > 0) {
        $data = json_encode($rows);
    }
@endphp

<script>
    $(document).ready(function(){
        // Hooks
        {{$id}}_add_before = function(itens, item, index) { return true; };
        {{$id}}_add_after = function(itens, item, index) { return true; };
        {{$id}}_remove_before = function(itens, item, index) { return true; };
        {{$id}}_remove_after = function(itens, item, index) { return true; };

        {{$id}}_itens = [];

        {{$id}}_load_no_rows_tr = function() {
            if ($('#{{$id}} > tbody > tr').length == 0) {
                let cols = JSON.parse('{!!$cols!!}');
                let tr_no_rows = $("<tr class='odd no-rows'><td valign='top' colspan='" + (cols.length + 1) + "' class='dataTables_empty'>Nenhum registro adicionado</td></tr>");
                $("#{{$id}}").find("tbody").append(tr_no_rows);
            }
        };

        {{$id}}_add = function(hooks = true) {
            // Cria nova linha a partir do clone da primeira
            let index = $('#{{$id}} > tbody > [id*="trow"]').length;
            let tr = $("<tr id='trow-{{$id}}-" + index + "'></tr>");
            let cols = JSON.parse('{!!$cols!!}');
            let item = {};

            // Clona todas as colunas da primeira linha para a nova linha
            $("#tfields-{{$id}}").children().each(function(i, el) {
                if ($(this).find('select').data('select2')) {
                    $(this).find('select').select2('destroy');
                }
                let td = $(this).clone(true);
                let id = td.find("input, select, textarea").attr("id");
                td.find("input, select, textarea").attr("id", id + "_" + index).attr("name", "{{$id}}[" + index + "][" + id + "]");
                td.find(".select2-multiple").attr("id", id + "_" + index).attr("name", "{{$id}}[" + index + "][" + id + "][]");
                if (typeof id != "undefined") {
                    let col = cols.filter(function(c) {
                        return (typeof id != "undefined" && c.field == id);
                    });
                    if (col.length > 0 && col.shift().hasOwnProperty("required")) {
                        td.find("input, select, textarea").attr("required", "true");
                    }
                }
                td.find("select").val($(this).find('select').val());
                tr.find("input").inputmask();
                tr.append(td);
                let value = td.find("input, select, textarea").val();
                if (typeof id != "undefined") item[id] = value;
            });

            if (hooks && !{{$id}}_add_before({{$id}}_itens, item, index)) return;
            
            // Altera as ações da nova linha
            tr.find("td#tfields-actions-{{$id}}").empty();
            tr.find("td#tfields-actions-{{$id}}").append("<button type='button' title='" + "{{__('strings.delete')}}" + "' class='btn btn-danger' onclick='{{$id}}_remove(" + index + ")'><i class='ri-delete-bin-line align-middle me-1'></i></button>");
            $('#{{$id}} > tbody > tr.no-rows').remove();
            $("#{{$id}}").find("tbody").append(tr);
            
            // Limpar todos os dados dos campos.
            $("#tfields-{{$id}}").find("input, select, textarea").each(function(i, el) {
                $(this).val($(this).attr('defaultvalue') ?? null);
            });
            $("#tfields-{{$id}}").find(':checkbox, :radio').each(function(i, el) {
                $(this).prop('checked', $(this).attr('defaultvalue') ?? false);
            });
            $("#{{$id}}").find("select").select2();

            {{$id}}_itens[index] = item;
            if (hooks && !{{$id}}_add_after({{$id}}_itens, item, index)) return;
        };

        {{$id}}_remove = function(index) {
            let item = {};
            let tr = $("#trow-{{$id}}-" + index);
            tr.find("td").each(function(i, el) {
                let id = $(this).find("input, select, textarea").attr("id");
                let value = $(this).find("input, select, textarea").val();
                if (typeof id != "undefined") item[id] = value;
            });

            if (!{{$id}}_remove_before({{$id}}_itens, item, index)) return;
            $("#trow-{{$id}}-" + index).remove();

            {{$id}}_itens[index] = undefined;
            {{$id}}_load_no_rows_tr();
            {{$id}}_remove_after({{$id}}_itens, item, index);
        };

        {{$id}}_load = function() {
            // Popula a detail com registros pré-cadastrados
            {{$id}}_load_no_rows_tr();
            let cols = JSON.parse('{!!$cols!!}');
            let data = JSON.parse('{!!$data!!}');
            if (data.length > 0) {
                for (let [i, row] of data.entries()) {
                    for (let col of cols) {
                        let val = eval("row." + col.field);
                        try {
                            $("#{{$id}} #" + col.field).val(eval(val)).trigger('change');
                        } catch (err) {
                            $("#{{$id}} #" + col.field).val(val).trigger('change');
                        }
                    }
                    {{$id}}_add(false);
                }
            }
        }
        {{$id}}_load();
    });    
</script>