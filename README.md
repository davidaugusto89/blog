# Blog

Sistema para cadastro de posts e usuários utilizando: HTML, CSS, Bootstrap, JS, JQuery, PHP, Laravel, MySQL e Redis.

![Stacks](https://skills.thijs.gg/icons?i=html,css,bootstrap,js,jquery,php,laravel,mysql,redis)

## Funcionalidades

- Cadastro de usuário com nome, e-mail e senha

- Área de login solicitando e-mail e senha

- Página para edição de informações pessoais

- Cadastro de post com Título, Texto e Imagem

- Listagem de posts publicados, com título, imagem, autor e data de publicação. Quando não estiver logado, os posts devem estar apenas para leitura. Caso o usuário esteja logado, poderá editar e excluir seus próprios posts

- Campo para filtrar e ou pesquisar os posts na exibição de posts do front-end

- Página para configuração de perfis de acesso. Esta página estará disponível apenas para usuários do com perfil de administrador, nela deverá existir uma lista dos usuários cadastrados no sistema, podendo o administrador dar a outro usuário o mesmo perfil de acesso à outros usuários do sistema.

- O Admin poderá também na listagem de posts, editar e excluir posts de outros usuários.

## Requisitos básicos

Antes de iniciar a instalação do projeto é necessário verificar se o ambiente possui: 

**Composer**

https://getcomposer.org/


**Git**

https://git-scm.com/book/en/v2/Getting-Started-Installing-Git


**PHP >= 8.0 e MySQL**

Pode ser utilizado WAMP/XAMPP/etc.

https://www.wampserver.com/en/
https://www.apachefriends.org/pt_br/index.html


**Redis**

Caso seja utilizado localmente será necessário instalar.

https://redis.io/docs/getting-started/installation/


## Instalação

Clone o projeto

```bash
git clone https://github.com/davidaugusto89/blog.git
```

Entre no diretório do projeto

```bash
cd blog
```

Instale as dependências

```bash
composer install
```

Crie o arquivo `.env` com base no `.env.example`

```bash
cp .env.example .env
```

Gere a "key" do projeto

```bash
php artisan key:generate
```

## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

Banco de dados MySQL: 

`DB_HOST`

`DB_PORT`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

Redis:

`REDIS_HOST`

`REDIS_PASSWORD`

`REDIS_PORT`

## Rodando localmente

Crie as tabelas no banco de dados

```bash
php artisan migrate
```

Para o cadastro do 1º usuário `ADMIN` (administrador) do sistema.

```bash
php artisan db:seed --class=CreateAdminUserSeeder
```

Inicie o servidor

```bash
php artisan serve
```

No navegador acesso a url abaixo, para seguir com os testes no sistema.
```bash
http://127.0.0.1:8000
```

## Usuário ADMIN

Dados de acesso para utilizar o usuário `ADMIN` (administrador).

| Parâmetro   | Valor      |
| :---------- | :--------- |
| E-mail | admin@gmail.com |
| Senha  | admin123 |

## Autor

- [@davidaugusto89](https://www.github.com/davidaugusto89)