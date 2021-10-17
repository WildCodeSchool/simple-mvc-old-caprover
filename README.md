# Simple MVC

## Description

This repository is a simple PHP MVC structure from scratch.

It uses some cool vendors/libraries such as Twig and Grumphp.
For this one, just a simple example where users can choose one of their databases and see tables in it.

## Steps

1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```
4. Import *database.sql* in your SQL server, you can do it manually or use the *migration.php* script which will import a *database.sql* file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.
7. From this starter kit, create your own web application.

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`

## Example 

An example (a basic list of items) is provided (you can load the *simple-mvc.sql* file in a test database). The accessible URLs are :

* Home page at [localhost:8000/](localhost:8000/)
* Items list at [localhost:8000/items](localhost:8000/items)
* Item details [localhost:8000/items/show?id=:id](localhost:8000/item/show?id=2)
* Item edit [localhost:8000/items/edit?id=:id](localhost:8000/items/edit?id=2)
* Item add [localhost:8000/items/add](localhost:8000/items/add)
* Item deletion [localhost:8000/items/delete?id=:id](localhost:8000/items/delete?id=2)

You can find all these routes declared in the file `src/routes.php`. This is the very same file where you'll add your own new routes to the application.

## How does URL routing work ?

![simple_MVC.png](.tours/simple_MVC.png)


## Ask for a tour !

<img src="https://pixabay.com/get/g0331c2b48fc494e8b7e78620f44e084095ee6d103f77538ce22e091e5bdb76bc9348ac4d544173c0ca92dbedb7937e50c941345acb2136df97dbc21ef5f652bab708e28c6edca9fb697d3cf931d1532e_640.jpg" alt="Guided tour" width="150"/>

We prepare a little guided tour to start with the simple-MVC.

To take it, you need to install the `Code Tour` extension for Visual Studio Code : [Code Tour](https://marketplace.visualstudio.com/items?itemName=vsls-contrib.codetour)

It will give access to a new menu on your IDE where you'll find the different tours about the simple-MVC. Click on play to start one : 

![menu](.tours/code_tour_menu.jpg)
