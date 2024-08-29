##  To-DO - Instructions
Real simple TODO app using old boostrap 3.4.1 - uses a resource controller and pagination basics.
Also added a Trait just as an example - rather than try/catching in each of the functions.
To test the error validation, you could easily inspect element and on task delete change the id to something like 9999


To run :
## Docker
### Pre-req
1. Docker installed
2. Clone repo

### Running
1. Ensure you copy the repo, and ensure you copy the `.env-example` to `.env` in the /src folder (in this example I've used the DB creds from docker just so save you entering it.. would not do this irl) 
2. in the build/docker/mysql folder, change `.env-example` to `.env`
3. Go to the root of the project and run `docker compose up`
4. Let the containers build
5. Once the containers boot, exec into the php container using GUI or `docker exec -it [container id] sh` (php_laravel container) and run `composer update --ignore-platform-reqs` for the vendor files,  AND `npm run build` this will ensure the vite logo asset is built.
6. Ensure you run php artisan key:generate
7. Run php artisan migrate - this will create the DB for us.
8. You're good to go! Inspect!  - It will be hosted on port 8009, so for example `http://127.0.0.1:8009/` 

## Non- Docker
### Pre-req
1. PHP installed locally, would recommend 8.2
2. MYSQL / Nginx installed, for example through Herd
3. Composer installed locally

### Running
1. Ensure you copy the repo - run composer install, and ensure you copy the .env-example to .env.
2.  run `composer update --ignore-platform-reqs` for the vendor files,  AND `npm run build` this will ensure the vite logo asset is built.
3. Ensure you run php artisan key:generate
4. Ensure the .env is connected to a DB - make sure the DB exists if you're running it manually.
5. Run php artisan migrate
6. You're good to go!
