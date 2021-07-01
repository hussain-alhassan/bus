# Environment Setup

## Docker usage:
1- Install Docker and Docker Compose if you don't have them:
* For Docker https://docs.docker.com/get-docker
* For Docker Compose https://docs.docker.com/compose/install

2- Run `docker-compose build` to build the project images.

3- Run `docker images` to see the images you just built.

4- Run `docker-compose up -d` to start the containers. `-d` flag is used to run containers in the background.

## Laravel usage:
1- Click this link http://localhost:8099. You will see a *warning* and a *fatal* error.

2- To fix the error, bash into your webserver container by running
`docker-compose exec webserver /bin/bash`

3- Run `cd ..` to change the directory to the /var/www directory.

4- Install composer by following these steps:
* Go to https://getcomposer.org/download and download it.
* Run `mv composer.phar /usr/local/bin/composer` to move composer to the bin directory.
* Run `composer install`

5- Click this link http://localhost:8099 again. You will see *Server Error 500*. To fix it, follow these steps:
* Run `cp .env.example .env`
* Run `php artisan key:generate`

6- Run `php artisan migrate --seed` to migrate and seed the DB.

7- Run `npm run dev` to compile and minify the scripts.

Congrats. The project should be up and running now!

## Agent Profile Management:
If you do not see the logos of the agents, please follow the instructions in the description of this PR
https://github.com/hussain-alhassan/bus/pull/15
