<title>{{__('strings.relatorio_livros_titulo')}}</title>

<h2 style="text-align:center;padding:10px;text-transform:uppercase">{{__('strings.relatorio_livros_titulo')}}</h2>

<table id="relatorio-livros" width="100%" border="1" style="border-collapse: collapse" cellspacing="1" cellpadding="0">
    <thead>
        <tr>
            <th colspan="6" height="20">{{__('strings.autor')}}</th>
        </tr>
        <tr>
            <th>{{__('strings.livro')}}</th>
            <th>{{__('strings.editora')}}</th>
            <th>{{__('strings.edicao')}}</th>
            <th>{{__('strings.anopublicacao')}}</th>
            <th>{{__('strings.assuntos')}}</th>
            <th>{{__('strings.valor')}}</th>
        </tr>
    </thead>
    <tbody>
        @php $currentautor = null; @endphp
        @foreach ($data as $row)
            @if ($row->autor_livro != $currentautor)
                @php $currentautor = $row->autor_livro; @endphp
                <tr>
                    <td colspan="6" bgcolor="#eee" height="20">{{$row->autor_livro}}</td>
                </tr>
            @endif
            <tr>
                <td>{{$row->codigo_livro}} - {{$row->titulo_livro}}</td>
                <td>{{$row->editora_livro}}</td>
                <td align="right">{{$row->edicao_livro}}</td>
                <td align="center">{{$row->ano_publicacao_livro}}</td>
                <td>{{$row->assuntos_livro}}</td>
                <td align="right">{{$row->valor_livro}}</td>
            </tr>    
        @endforeach
    </tbody>
</table>

<p>
    Observações do relatório no README do projeto.
</p>