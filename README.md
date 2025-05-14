## TODO Laravel 

Autor: jonathanlourette@gmail.com - [MIT license](https://opensource.org/licenses/MIT)

## Instalação e/ou Execução  (Linux/WSL2 com Docker ou Docker Desktop)

* Instalação
    
    Copiar arquivo .env (`cp .env.example .env`)

    `composer install --ignore-platform-reqs` (instalar sem verificar dependencias pois usaremos o docker com  sail)
    
    Na pasta do projeto executar : 

    `./vendor/bin/sail up -d` ou `sail up -d` (se tiver o alias do sail configurado)

    `sail artisan migrate --seed`

* Execução

    Na pasta do projeto executar :
    * Iniciar projeto `./vendor/bin/sail up -d` ou `sail up -d`
    * Parar o projeto `./vendor/bin/sail down` ou `sail down`