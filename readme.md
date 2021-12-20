# Tester
Aplicación en Laravel con 3 motores de bases de datos diferentes dockerizados 
para realizar pruebas de performance comparativas entre motores.
Desarrollado para la catedra Administracion de Bases de Datos 2021 UTN FRLP (Argentina)

# Instalación
# Levantar entorno en Docker
docker-compose up -d

# Instalar composer
docker exec -it tester_php composer install

# Generar llave unica para la app
docker exec -it tester_php php artisan key:generate

# Elegir el motor de DB a testear
cambiar el archivo .env por el motor de DB deseado

# Migrar datos a la DB
docker exec -it tester_php php artisan migrate --seed

# Instalar NPM
docker exec -it tester_php npm install
docker exec -it tester_php npm run dev
