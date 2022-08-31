# Kiwi Dashboard

![alt text](https://static.wikia.nocookie.net/vsbattles/images/e/ea/Kiwi.png)

A basic admin panel written with [PHP 8,1 ](https://www.php.net/releases/8.1/en.php) and [CakePHP 4.7.2](https://cakephp.org).

Front-end made with [JQuery 3.6.0](https://jquery.com/), [Bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/), [SB Admin 2](https://startbootstrap.com/theme/sb-admin-2) 

### Features
You can expand these above simply following my directives


- Auth system;
- Operators (Admins) and Users CRUD operations;
- Real time analytics system;
- Api web hook with analytics and users methods

### Miscellaneous
Some global variables that handle something globally are stored in /config/config.php

You can use a Table method just like this `$this->users_table->METHOD_NAME`

WebHook is callable on the method request in the file src/Controller/ApiController.php
## Installation

1. Download [Composer](https://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run

```bash
composer install
```

You can now either use your machine's webserver to view the default home page, or start
up the built-in webserver with:

```bash
bin/cake server -p 8765
```

Then visit `http://localhost:8765` to see the welcome page.

## MySQL Database

The .sql file is provided in the root of the project, remember to edit the config/app_local.php for the DB settings.

#### Login with usr: admin@test.com & passw: admin
