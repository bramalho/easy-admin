# Easy Admin

```sh
docker-compose up -d

docker-compose exec php sh

composer install

./bin/console doctrine:migrations:migrate

./bin/console doctrine:fixtures:load
```
