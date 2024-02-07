# CadastroCorretor
 Cadastro de Corretores. Aplicação feita utilizando HTML, CSS, JS & PHP (junto do framework Laravel).

# Necessário para rodar

```bash
PHP 8
Laravel 9.x
MySQL
# Criar banco de dados na máquina local, nomeá-la como laravel. Usuário por padrão root e senha vazia.
# Caso adicione um BD com nome, usúario ou senha divergente, necessário alterações no arquivo env.
```



# Como rodar
```bash
#Instalação das dependências:
    composer install
#Se necessário configuração do Ambiente:
    php artisan key:generate
#Se necessário criar tabelas no DB
    php artisan migrate
#Iniciar servidor local (por padrão http://localhost:8000)
    php artisan serve
```
