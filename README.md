# Slim 3 Skeleton

This is a simple skeleton project fork from akrabat/slim3-skeleton 

### Run it:

1. `$ cd slimfram`
2. Change database setting `app\setting.php`
3. `$composer install`
4. `$ vendor/bin/phpmig migrate`

## Key directories

* `app`: Application code
* `app/src`: All class files within the `App` namespace
* `app/templates`: Twig template files
* `cache/twig`: Twig's Autocreated cache files
* `log`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

## Key files

* `public/index.php`: Entry point to application
* `app/settings.php`: Configuration
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/src/Action/HomeAction.php`: Action class for the home page
* `app/templates/home.twig`: Twig template file for the home page

### Demo User:

1. `admin` username: `admin@slim.dev` password: `password` 
2. `moderator` username: `moderator@slim.dev` password: `password` 

### access to trasaction apps:

1. `login` then access: `/trx`

### my working part:

1. app/src/Action/TrxmoneyAction.php 
2. app/src/Model/Transaction.php
3. app/src/Model/User.php 
4. app/templates/send.twig 
5. app/templates/trx.twig 
6. migrations/20151221231934_user.php 
7. migrations/20170303110312_transaction.php 

