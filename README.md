<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 RESTful API with OAuth 2.0 </h1>
    <br>
</p>

This is a RESTful API with OAuth2 authentication/security developed using Yii2 framework.
You can use this if you want to quick start developing your own custom RESTful API by skipping 95% of your scratch works.
Hopefully this will save lot of your time as this API includes all the basic stuffs you need to get started.

This API also includes a developer dashboard with the API documentation which is developed in Yii2. This will be useful to manage your developers access to the API documentation.

[DEMO](http://yii2-rest.dockerboxes.us)
-------------------
```
http://developers.yii2.nintriva.net
Login: developer/developer
```

## Official Documentation

Documentation for this RESTful API can be found on the [Yii2 RESTful API with OAuth2 Documenation](http://developers.yii2.nintriva.net/).

## Security Vulnerabilities

If you discover a security vulnerability within this template, please send an e-mail to Sirin k at sirin@nintriva.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



INSTALLATION


```
Step1: Create a database named yii2_rest
Step2:Clone the source code
git clone -b master https://github.com/sirinibin/yii2-rest.git

Step3: cd yii2-rest
Step4:composer install
Step5: ./init
Step6: vim common/config/main-local.php
change db information
 'db' => [

            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=127.0.0.1;dbname=yii2_rest',

            'username' => 'root',

            'password' => '123',

            'charset' => 'utf8',

        ],

Step7: Run db migration
           cd /var/www/yii2-rest
            ./yii migrate

Step8:
            point API end point URL to backend
             /var/www/yii2-rest/backend/web


            point frontend URL to frontend
             /var/www/yii2-rest/frontend/web
```

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

[![Latest Stable Version](https://poser.pugx.org/yiisoft/yii2-app-advanced/v/stable.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://poser.pugx.org/yiisoft/yii2-app-advanced/downloads.png)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)
