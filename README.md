## Features

- Laravel 7
- Vue + VueRouter + Vuex + VueI18n + ESlint
- Pages with dynamic import and custom layouts
- Login, register, email verification and password reset
- Authentication with JWT
- Socialite integration
- Bootstrap 4 + Font Awesome 5

## Installation Docker
```bash
git clone https://github.com/hammer92/pharmasan.git

sudo chown -R $USER:$USER ~/pharmasan

docker-compose build

docker-compose up -d


```

## Crear Usuario MySQL Docker
```bash
docker-compose exec db bash

mysql -u root -p

GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';
FLUSH PRIVILEGES;
EXIT;
exit

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed  

```
