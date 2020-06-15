# testexercise
Test exercise


## Установка 

1. Запускаем docker
2. Устанавливаем битрикс в папку 'site' (тут самое главное не перезатереть, то что находится внутри)
3. Обновляем composer
4. Заходим в контейнер docker-a 'php' под bash. (docker exec -ti php /bin/bash)
5. cd /var/www
6. ./vendor/bin/jedi module:register sb.cars
7. ./vendor/bin/jedi module:register sprint.migration
8. php /bitrix/modules/sprint.migration/tools/migrate.php up
