Links.solomaha.me
============================

URL Shortener built on Yii2 Framework with Material Design Lite. It's my personal pet-project.

Tests are outdated! Don't use it. Or write new for me :)

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      config/             contains application configurations
      controllers/        contains Web controller classes
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

* PHP version at least 5.4.0
* Composer
* Git


INSTALLATION
------------

Run in your command prompt:

~~~
git clone https://github.com/CyanoFresh/Links.git links
cd links
composer install
~~~

Then configure app by editing config files in the `config` directory. See section below \/ \/ \/

CONFIGURATION
-------------

### Database

Edit the file `config/db-local.php` with real data, for example:

```php
return [
    'dsn' => 'mysql:host=localhost;dbname=links',
    'username' => 'root',
    'password' => '1234',
];
```

**NOTE:** Yii won't create the database for you, this has to be done manually before you can access it.

Also check and edit the other files in the `config/` directory to customize your application.
