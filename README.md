# Laravel Docker Base

Used to get a new project started quickly

## Two methods for use:
<table>
	<thead>
		<tr>
			<th>Full Laravel</th>
			<th>Laravel + Vite</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				Recommended folder structure:
				<ul>
					<li>./my-project <-- this repo</li>
					<li>./my-project/docker-compose.yml</li>
					<li>./my-project/.env</li>
					<li>./my-project/web <-- laravel app</li>
				</ul>
			</td>
			<td>
				Recommended folder structure:
				<ul>
					<li>./my-project <-- this repo</li>
					<li>./my-project/docker-compose.yml</li>
					<li>./my-project/.env</li>
					<li>./my-project/api <-- laravel app</li>
					<li>./my-project/web <-- vite app</li>
				</ul>
			</td>
		</tr>
	</tbody>
</table>



*Note: when using Vite, it is recommended to change the NginX ports for HTTP & HTTPS to something like 8080/8443 so that your UI (through Vite) can run on port 80/443. All API calls to Laravel would then use the 8080/8443 ports*

## Set Up
1. Download this repo as a ZIP, or create a new GitHub repository using this as a template
2. From your terminal, enter into the root folder for this repo/project (ex: "my-project")
3. Rename example.env to .env ```mv example.env .env```
4. Create your laravel app. Recommended to create it in a folder called "web" (for full laravel) or "api" (when also using Vite)
    * *Note you will need to have composer installed (```brew install composer```) and PHP (```brew install php```). If you really do not want to install composer (or Brew) locally, you could execute everything from within the PHP-FPM container which has Composer installed, but will require a few extra steps for moving the contents of the created project to the root, since the root will already be mapped to "web" when you boot your container - or temporarily change the root web folder on php container using the .env file.*
    * **Full Laravel:** ``` ./my-project$ composer create-project laravel/laravel web ```
    * **Laravel + Vite:** 
      * ``` ./my-project$ composer create-project laravel/laravel api ```
      * ``` ./my-project$ yarn create vite web --template vue``` *you could alternatively use ```--template vue-ts``` for typescript support*

5. In the .env file at the root of your project, rename the COMPOSE_PROJECT_NAME to something short that makes
senese for your app.
    * This becomes the prefix for docker images/names and is a good thing to do to
 avoid reusing the same image/instance for multiple projects.
    * Important especially when installing different plugins/mods/packages to the image that are specific to a project.
6. **If using Laravel + Vite:** In the .env file at the root of your project, update the value of ```APP_CODE_PATH_HOST``` to be "./api/" instead of "./web/"
7. Boot your project: ```docker-compose up -d```
    * Initial boot may take several minutes as it will need to build each image.
8. In the **.env** file within your **web** folder:
    1. modify the DATABASE values to match the MySQL values within your root .env file. For development, I typically use root/root for the username, pass. Database host will be "mysql" unless you renamed it within your docker-compose.
    2. Modify the REDIS host to be "redis" unless you named it something else within your docker-compose.
    3. Modify the SMTP values to match that of the Mailhog docker container. Host = mailhog; port = 1025.
    4. Set values for PUSHER_APP_<id/key/secret>. For local dev, these can be arbitrary values. Set the BROADCAST_DRIVER value to "pusher"
    5. Set the following values to "redis": SESSION_DRIVER, CACHE_DRIVER, QUEUE_CONNECTION,
9. Open another terminal tab, as you will (most likely) want to have 2 things running at once (both in the php container):
    1. **Terminal 1:**
        1. run ```docker-compose exec php bash```
        1. Once inside the php docker container, run:
            1. ```composer install```
            1. ```php artisan migrate```
            1. Use this terminal to run other commands such as ```php artisan .....```
    2. **Terminal 2:**
       1. For **Full Laravel:**
           1. run ```docker-compose exec php bash```
               1. Once iniside the php docker container, run:
                   1. ```npm install```
                   1. ```npm run watch```
                       * This will keep the npm process running, watching for changes to your application and automatically recompiling. Editing certain root files (like webpack, etc) may require you to stop this command and re-run it.
                       * Let this terminal stay open and running in the background
       2. For **Laravel + Vite:**
          1. run ```yarn dev --https```


### Special considerations when using Laravel + Vite
You can simplify some 

## Recommended packages
To make the most of this, I recommend the following packages:
#### Horizon (Queue)
Note - if you are not using this, you should remove/comment the Queue container from your docker-compose file

Follow directions on the Laravel Horizon docs page.
* ```composer require laravel/horizon```

#### Websockets
Note - if you are not using this, you should remove/comment the Websocket container from your docker-compose file

Follow directions from the Beyondcode Websockets docs page
* ```composer require beyondcode/laravel-websocket```

#### Search
If using the Meili Search docker container:
* ```composer require laravel/scout```
* ```composer require meilisearch/meilisearch-php```


#### Environment sync
To keep the .env file and the example env file in sync:
* ```composer require poseidonphp/laravel-env-sync```
* Read command help for how to use this package*
