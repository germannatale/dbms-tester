# DBMS Tester
Aplicación desarrollada Laravel con 3 motores de bases de datos diferentes dockerizados 
para realizar pruebas de performance comparativas entre motores.
Desarrollado para la catedra Administracion de Bases de Datos 2021 UTN FRLP (Argentina)

## Tecnologias
![laravel](https://img.shields.io/badge/laravel-^8.0-informational)
![php](https://img.shields.io/badge/laravel-^7.4-informational)
![bootstrap](https://img.shields.io/badge/bootstrap-^4.0-informational)

## Motores
![MariaDB](https://img.shields.io/badge/mariadb-^10.4-informational)
![MongoDB](https://img.shields.io/badge/mongodb-^5.0-informational)
![PostgresSQL](https://img.shields.io/badge/pgsql-^14.1-informational)

## Cliente
![phpmyadmin](https://img.shields.io/badge/phpmyadmin-^5.1-informational)
![mongo-express](https://img.shields.io/badge/mongo-express-^1.0-informational)
![pgadmin](https://img.shields.io/badge/pgadmin-^5.7-informational)

## Instalación

### Levantar entorno en Docker
```
docker-compose up -d
````

### Instalar composer
```
docker exec -it tester_php composer install
```

### Generar llave unica para la app
```
docker exec -it tester_php php artisan key:generate
```

### Elegir el motor de DB a testear
Crear .env (puede renonbrar env.example)

### Migrar datos a la DB
```
docker exec -it tester_php php artisan migrate --seed
```

### Instalar NPM
```
docker exec -it tester_php npm install
docker exec -it tester_php npm run dev
```

## Otros comandos útiles
`docker exec -it tester_php php artisan migrate:fresh --seed` Restaura toda las DBs

## Problemas conocidos
Puede necesitar iniciar manualmente la base de datos en PostgresSQL. Para ello inicie el cliente PGadmin 
(por defecto http://localhost:8805) y cree una nueva base de datos con las misma credenciales que figuran 
en el `.env`.


