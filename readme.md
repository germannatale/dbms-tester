# CURE
Calculadora para el Uso Responsable de la Energía
Desarrollado para la catedra Diseño de Sistemas 2021 UTN FRLP (Argentina)

# Instalación
# Levantar entorno en Docker
docker-compose up -d

# Instalar composer
docker exec -it cure_php composer install

# Generar llave unica para la app
docker exec -it cure_php php artisan key:generate

# Migrar datos a la DB
docker exec -it cure_php php artisan migrate --seed

# Instalar NPM
docker exec -it cure_php npm install
docker exec -it cure_php npm run dev
