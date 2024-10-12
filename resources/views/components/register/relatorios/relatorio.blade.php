<title>Relatório de livros</title>

<h2 style="text-align:center;padding:10px;">RELATÓRIO GERAL DE LIVROS</h2>

<table id="relatorio-livros" width="100%" border="1" style="border-collapse: collapse" cellspacing="1" cellpadding="0">
    <thead>
        <tr>
            <th>Autor</th>
            <th>Livro</th>
            <th>Editora</th>
            <th>Edição</th>
            <th>Ano pub.</th>
            <th>Assuntos</th>
            <th>Valor R$</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{$row->autor_livro}}</td>
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
    Fiz a consulta agrupada por autor devido ao requisito solicitado,
    porém, pra mim essa exibição não faz muito sentido, sendo que mesmo agrupando por
    autor, caso a ideia seja apresentar somente um único registro por autor,
    o agrupamento se desfaz no momento em que um livro possuir mais de um assunto (visto que, segundo o requisito, é preciso juntar as 3 tabelas principais),
    a menos que a exibição seja mistrurada agregando livros e assuntos, mais ou menos assim:<br><br>
    | autor | livro 1, livro 2, livro 3 | assunto 1 livro 1, assunto 2 livro 1, assunto 1 livro 2, assunto 2 livro 2... |<br><br>
        
    O ideal seria não trazer os assuntos dos livros, então o agrupamento ficaria ok, pois daria pra
    agregar somente o título do livro e não trazer as demais informações, então apresentaria algo como:<br><br>
    | autor | livro 1, livro 2, livro 3 |<br><br>
    
    Pra ser mais preciso eu precisaria ver um exemplo de exibição da listagem desejada, então construiria o sql de acordo.
</p>