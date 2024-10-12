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
