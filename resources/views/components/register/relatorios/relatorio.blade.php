@extends('layouts.app')
@section('body')

<p>
Fiz a consulta agrupada por autor devido ao requisito solicitado,<br>
porém, pra mim essa exibição não faz muito sentido, sendo que mesmo agrupando por<br>
autor, caso a ideia seja apresentar somente um único registro por autor,<br>
o agrupamento se desfaz no momento em que um livro possuir mais de um assunto (visto que, segundo o requisito, é preciso juntar as 3 tabelas principais), <br>
a menos que a exibição seja mistrurada agregando livros e assuntos, mais ou menos assim:<br>
| autor | livro 1, livro 2, livro 3 | assunto 1 livro 1, assunto 2 livro 1, assunto 1 livro 2, assunto 2 livro 2... |<br><br>
    
O ideal seria não trazer os assuntos dos livros, então o agrupamento ficaria ok, pois daria pra<br>
agregar somente o título do livro e não trazer as demais informações, então apresentaria algo como:<br>
| autor | livro 1, livro 2, livro 3 |<br><br>

Pra ser mais preciso eu precisaria ver um exemplo de exibição da listagem desejada, então construiria o sql de acordo.
</p>

<table id="relatorio-livros" class="table table-striped my-4 w-100 dataTable no-footer dtr-inline">
    <thead>
        <tr>
            <th>Autor</th>
            <th>Livro</th>
            <th>Assuntos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{$row->autor_livro}}</td>
                <td>{{$row->titulo_livro}}</td>
                <td>{{$row->assuntos_livro}}</td>
            </tr>    
        @endforeach
    </tbody>
</table>

@stop