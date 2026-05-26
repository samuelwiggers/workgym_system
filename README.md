# Academia — Laravel CRUD

Acadêmicos: Samuel Wiggers & Julio Max
Projeto: gestão simples de academia com 5 entidades e CRUD completo.

## Entidades

- **Alunos** (`students`)
- **Planos** (`plans`)
- **Instrutores** (`instructors`)
- **Aulas** (`lessons`)
- **Matrículas** (`enrollments`)

## Requisitos

- PHP 8.2+
- Composer
- Extensão `pdo_sqlite`

## Instalação

```bash
composer install
cp .env.example .env   # se ainda não existir .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate:fresh --seed
php artisan serve
```

Acesse: http://127.0.0.1:8000

## Sem PHP no sistema (Docker)

```bash
docker run --rm -v "$(pwd):/app" -w /app composer:latest composer install
docker run --rm -v "$(pwd):/app" -w /app composer:latest php artisan migrate:fresh --seed
docker run --rm -p 8000:8000 -v "$(pwd):/app" -w /app composer:latest php artisan serve --host=0.0.0.0
```

## Rotas principais

| Recurso     | URL            |
|------------|----------------|
| Alunos     | `/students`    |
| Planos     | `/plans`       |
| Instrutores| `/instructors` |
| Aulas      | `/lessons`     |
| Matrículas | `/enrollments` |
