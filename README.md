# FestejApp
Projeto do Aplicativo para divulgação de Eventos - FestejApp

## Instalação

### 1. Nodejs
Primeiro, instale o Node.js:
- [Node.js](https://nodejs.org/en/)

### 2. Ionic
Instalar o Ionic
~~~
npm install -g ionic
~~~

## Baixar o projeto

Repositório do Projeto
~~~
(https://github.com/jhonypalmer/FestejApp)
~~~

## Criar pasta dentro do projeto

Após baixar o projeto, crie uma pasta dentro da pasta do projeto chamada: *node_modules*

## Executando o aplicativo

Abra o prompt de comando dentro da pasta do projeto e execute
~~~
cd FestejApp
ionic serve
~~~

# Server
~~~
cd server
composer install
cp .env.example .env
~~~
Inserir credenciais do banco de dados no arquivo .env
Banco de dados deve estar criado e nome adicionado no .env
Adicionar `JWT_SECRET=chave_privada` no arquivo .env
~~~
php artisan migrate
php -S localhost:8000 -t public
~~~
