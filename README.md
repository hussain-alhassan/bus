# Setup the Environment

## Docker usage:
1- You should put the *docker-compose.yml* and *Dockerfile* in your project.
2- Run `docker build` to build the project images.
3- Run `docker images` to see the images.
4- Run `docker-compose up -d` to start the containers. `-d` flag is used to run containers in the background.

## Laravel usage:
1- Click this link http://localhost:8099. You will see a *warning* and a *fatal* error.
2- To fix the error, bash into your webserver container by running
`docker-compose exec webserver /bin/bash`
3- Run `cd ../` to change the directory to the /var/www directory.
4- Install composer by following these steps
* Go to https://getcomposer.org/download and download it.
* Run `mv composer.phar /usr/local/bin/composer` to move composer to the bin directory.
- Run `composer install`
5- Click this link http://localhost:8099 again. You will see *Server Error 500*. To fix it, follow these steps:
* Run `cp .env.example .env`
* Run `php artisan key:generate`

Congrats. The project should be up and running now!
