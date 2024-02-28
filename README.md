# README

Este é um projeto PHP que implementa um CRUD para gerenciar uma lista de itens de todo.

## Rotas

- `/list`: Retorna todos os itens da lista de todo.
- `/item/{id}`: Retorna um item específico pelo seu ID.
- `/create`: Cria um novo item na lista de todo.
- `/update/{id}`: Edita um item específico.
- `/delete/{id}`: Deleta um item específico.

## Frontend

Este CRUD é o backend de um projeto que também possui um frontend.
  * Link Front-End : https://github.com/Bruno-TL/frontCrud

## Pré-requisitos

Certifique-se de ter PHP instalado em sua máquina.

## Como executar

1. Clone este repositório.
2. Execute  php -S localhost:8000 -t public , para iniciar um server PHP.
3. Configure seu servidor web para direcionar as requisições para o diretório raiz do projeto.
4. Certifique-se de configurar corretamente o acesso ao banco de dados, se aplicável.
   * Configure o arquivo: ConnectionDb.php com as credenciais do seu DB.
6. Acesse as rotas conforme mencionado acima para utilizar o CRUD.

