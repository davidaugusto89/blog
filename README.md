




## Stack utilizada

**Front-end:** HTML, CSS, Bootstrap, JS e JQuery.

**Back-end:** PHP, Laravel e MySQL.




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
  npm install
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

`DB_HOST`

`DB_PORT`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

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

Enderço para testes do sistema
```bash
http://127.0.0.1:8000
```

## Usuário ADMIN

Dados de acesso para utilizar o usuário `ADMIN` (administrador).

| Parâmetro   | Valor      |
| :---------- | :--------- |
| `E-mail` | `admin@gmail.com` |
| `Senha`  | `admin123` |

## Autor

- [@davidaugusto89](https://www.github.com/davidaugusto89)