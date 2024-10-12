## Projeto de teste Augusto Alves da Silva

### Subindo o projeto
O projeto está adaptado à utilização de containers docker, portanto, possuindo o docker e docker-compose instalados, basta executar o seguinte comando na raiz do projeto (utilizar "sudo" se necessário):
```
$ sudo docker-compose up
```

### Acessando a aplicação
Após finalizado o processo de up do docker-compose, então acessar http://localhost:8000/. Coloquei na porta 8000 para não afetar outros serviços que possam estar rodando na porta 80.

### Testes unitários
Para executar os testes unitários, é necessário conectar no container da aplicação "teste-spassu_app" e executar o seguinte comando:
```
$ php artisan test
```

### Relatório
A view da qual o relatório utiliza está implementada em um arquivo de seeder, para que desta forma, toda vez que as migrations de banco forem executadas, a view seja atualizada. Segue local da view:
```
database\seeders\LivrosViewSeeder.php
```
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
