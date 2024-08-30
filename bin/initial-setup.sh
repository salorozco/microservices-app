# Start containers
docker-compose build

# Start container
docker-compose up -d

# Run composer install
docker-compose exec api-gateway composer install
docker-compose exec users-service composer install
docker-compose exec posts-service composer install
docker-compose exec comments-service composer install

# Set up Vue frontend
docker-compose exec vue-frontend npm install

# Run migrations
docker-compose exec users-service vendor/bin/doctrine-migrations migrate --no-interaction
docker-compose exec posts-service vendor/bin/doctrine-migrations migrate --no-interaction