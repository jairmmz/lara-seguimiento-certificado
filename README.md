<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## MANUAL

Este proyecto es una API RESTful desarrollada con Laravel 11 para la gestión de certificados y seguimiento de participantes en cursos.

## Requisitos previos

Asegúrate de tener instalado lo siguiente en tu sistema:

- PHP >= 8.2
- Composer
- MySQL o cualquier base de datos compatible
- Node.js > 20.*
- Git

## Clonar el repositorio

Clona el proyecto desde el repositorio de GitHub:

```bash
git clone https://github.com/jairmmz/lara-seguimiento-certificado.git
cd lara-seguimiento-certificado
```

## Instalar dependencias

Ejecuta el siguiente comando para instalar las dependencias del backend:

```bash
composer install
```

## Generar la clave de la aplicación

Crea un archivo `.env` a partir del archivo de ejemplo:

```bash
cp .env.example .env
```

Genera una nueva clave de aplicación:

```bash
php artisan key:generate
```

## Configurar la base de datos

Edita el archivo `.env` para configurar los datos de conexión de tu base de datos:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña
```

## Migrar las tablas y ejecutar seeders

Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

```bash
php artisan migrate
```

Opcionalmente, ejecuta los seeders para poblar la base de datos con datos iniciales:

```bash
php artisan db:seed
```


## Para eliminar las tablas de la base de datos y ejecutar los seeders:

```bash
php artisan migrate:fresh --seed
```

## Para crear la carpeta de almacenamiento de certificados

```bash
php artisan storage:link
```

## Para eliminar la cache del servidor en desarrollo:

```bash
php artisan cache:clear
```

```bash
php artisan config:clear
```

```bash
php artisan route:clear
```

```bash
php artisan view:clear
```
## Iniciar el servidor de desarrollo

Inicia el servidor de Laravel (O iniciar por laragon por el host virtual del proyecto):

```bash
php artisan serve
```

## Para desplegue  en producción:

```bash
php artisan optimize:clear
```
