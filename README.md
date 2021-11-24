## Development setup
#### Docker:

-   Install docker environment
    -   [MacOS](https://docs.docker.com/docker-for-mac/install/)
    -   [Ubuntu - Linux](https://docs.docker.com/engine/install/ubuntu/)
    -   [Windows](https://docs.docker.com/docker-for-windows/install/)
-   Install docker-compose tools ([link](https://docs.docker.com/compose/install/))
-   Config env:
    -   Make a copy of .env.example, name `.env` (cp .env.example .env)
    -   Edit DB env
    -   WIP...
-   Set full permission for app storage:
    `(sudo) chmod -R 775 storage`
-   Run containers:
    `docker-compose up -d`
-   Install dependencies:
    `docker-compose exec php-fpm composer install`
-   Generate app key:
    `docker-compose exec php-fpm php artisan key:generate`
-   Migration and seeding: `docker-compose exec php-fpm php artisan migrate --seed`
-   Reset Migration and seeding: `docker-compose exec php-fpm php artisan migrate:fresh --seed`
-   Storage Link: `docker-compose exec php-fpm php artisan storage:link`
-   Cache config:
    `docker-compose exec php-fpm php artisan config:cache`
-   Done

## Dependencies
- [spatie-query-builder](https://spatie.be/docs/laravel-query-builder/v3/introduction)
- [spatie-laravel-permission](https://spatie.be/docs/laravel-permission/v4/introduction)
- [laravel-excel](https://docs.laravel-excel.com/3.1/getting-started/)
- ...
## Todo:
-   ~~製品リスト~~
-   ~~商品を追加~~
-   ~~商品の編集~~
-   ~~製品の削除~~
-   製品詳細
-   事業内容
-   採用登録フォーム
-   採用情報
-   採用情報リスト
