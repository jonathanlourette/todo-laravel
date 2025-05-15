## TODO Laravel 

Autor: jonathanlourette@gmail.com - [GPL-2](https://opensource.org/license/gpl-2-0)

## Requisitos

* PHP ^8.2
* Composer ^2.0
* MySQL 8

## Isenção de responsabilidade

Este software é fornecido "no estado em que se encontra", sem garantias. O uso, modificação, instalação e execução por métodos alternativos são de responsabilidade do usuário.

## Instalação e/ou Execução ambiente Dev (Linux/WSL2 com Docker ou Docker Desktop)

* Instalação
    
    Copiar arquivo .env (`cp .env.example .env`)

    `composer install --ignore-platform-reqs` (instalar sem verificar dependencias pois usaremos o docker com  `sail`)
    
    Na pasta do projeto executar : 

    `./vendor/bin/sail up -d` ou `sail up -d` (se tiver o alias do sail configurado)

    `sail artisan migrate --seed` (Seed criará o usuário inicial Administrador)

        Usuário: admin@teste.com.br
        Senha: 123456789

* Execução

    Na pasta do projeto executar :
    * Iniciar projeto `./vendor/bin/sail up -d` ou `sail up -d`
    * Parar o projeto `./vendor/bin/sail down` ou `sail down`

    O projeto deve estar em execução em [http://localhost/](http://localhost/)