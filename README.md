##  To-DO - Instructions
Real simple TODO app using old boostrap 3.4.1 - uses a resource controller and pagination basics.
Also added a Trait just as an example - rather than try/catching in each of the functions.
To test the error validation, you could easily inspect element and on task delete change the id to something like 9999


To run :
## Docker
### Pre-req
1. Docker installed
### Running
1. in the build/docker/mysql folder, change `.env-example` to `.env`
1. Ensure you copy the repo, and ensure you copy the `.env-example` to `.env` in the /src folder (in this example I've used the DB creds from docker just so save you entering it.. would not do this irl) 
2. Go to the root of the project and run `docker compose up`
3. Let the containers build
4. One the containers boot, exec into the php container using GUI or `docker exec -it` and run `npm run build` 
5. Run php artisan migrate - this will create the DB for us.
6. You're good to go! Inspect! 

## Standard
### Pre-req
1. PHP installed locally, would recommend 8.2
2. MYSQL / Nginx installed, for example through Herd.

### Running
1. Ensure you copy the repo - run composer install, and ensure you copy the .env-example to .env.
2. Ensure you run php artisan key:generate
3. Ensure the .env is connected to a DB - make sure the DB exists if you're running it manually.
4. Run php artisan migrate
5. You're good to go!
