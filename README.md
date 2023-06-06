## Sobre

Laravel Tenancy es una librería de código abierto diseñada para facilitar la implementación de la arquitectura de "multi-tenancy" en aplicaciones web desarrolladas con el framework Laravel.

La arquitectura de "multi-tenancy" se refiere a la capacidad de una aplicación para atender a múltiples inquilinos o clientes, donde cada inquilino tiene su propio conjunto aislado de datos y configuración. Esto es especialmente útil en aplicaciones de software como servicio (SaaS) donde se desea tener una única instancia de la aplicación que sirva a múltiples clientes.

-   **[Laravel-multitenancy](https://spatie.be/docs/laravel-multitenancy/v1/introduction)**

# Laravel Tenancy Usage Demo

Demo práctico y documentado para mostrar cómo utilizar la librería Laravel Tenancy en proyectos Laravel. Incluye ejemplos de configuración, implementación y mejores prácticas.

## Repositorio

```bash
  git clone https://github.com/chelitodelgado/laravel-tenancy-usage-demo.git
  cd laravel-tenancy-usage-demo
```

Configurar las variables de entorno tomando en cuenta el gestor de base de datos deceado: el siguiente ejemplo esta basdo en Postgresql, sin embargo es la misma configuracion tanto para Mysql, MariaDb, SqlLite, etc.

## Archivo de configuracion .env

Sustituye los varoles deacuerdo a tu gestor de base de datos:

```.env
  DB_CONNECTION=tenant
  DB_HOST=127.0.0.1
  DB_PORT=5432
  DB_DATABASE=null
  DB_USERNAME=postgres
  DB_PASSWORD=root

  LANDLORD_DB_HOST=127.0.0.1
  LANDLORD_DB_PORT=5432
  LANDLORD_DB_DATABASE=laravel_multi_tenancy_landlord
  LANDLORD_DB_USERNAME=postgres
  LANDLORD_DB_PASSWORD=root
```

## Instalacion

Este paquete requiere PHP 7.4+ y Laravel 7.0+.

```bash
  composer update
```

```bash
  php artisan key:generate
```

```bash
  php artisan serve
```

## Configurar Virtual Host (Linux: Ubuntu)

```bash
  cd /etc/apache2/sites-available
  sudo cp 000-default.conf localhost.conf
  sudo nano localhost.conf
```

Configuracion del virtual host

```bash
  <VirtualHost *:80>
    ServerName localhost
    ServerAlias www.localhost
    DocumentRoot /var/www/html/laravel-tenancy-usage-demo/public
    <Directory /var/www/html/laravel-tenancy-usage-demo/public>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
```

```bash
  sudo a2ensite localhost.conf
  sudo systemctl restart apache2
```

Abrir el archivo hosts

```bash
  sudo nano /etc/hosts
  ....
  ....
  127.0.0.1	localhost
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
