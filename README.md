# Laravel Docker Base

Used to get a new project started quickly

Recommended folder structure:

* ./my-project <-- this repo
* ./my-project/docker-compose.yml
* ./my-project/.env
* ./my-project/web <-- laravel app
	* ``` ./my-project$ composer create-project laravel/laravel web ```

In the .env file, rename the COMPOSE_PROJECT_NAME to something short that makes 
senese for your app. 
This becomes the prefix for docker images/names and is a good thing to do to
 avoid reusing the same image/instance for multiple projects. 

Important especially when installing different plugins/mods/packages to the image that are specific to a project.
