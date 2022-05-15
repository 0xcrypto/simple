# Simple Framework

A Simple PHP framework to help you make websites and web applications faster. [Fork](./fork)

## Getting Started

Simple Framework is kinda DIY framework. To keep everything light, Simple Framework is not packed with lots of features. It just gives you enough ground to build further. As simple as it can get, the Simple Framework is primarily developed to be compatible with Shared Hosting Providers. I have been working with clients who need their websites to be served on shared hosting. While I do love building with Laravel, it soon becomes an overkill as the project grows but resources don't. Simple Framework aims to give the same feel of Laravel but with quite less resource consumptions and overwhelming complexity. Simple Framework comes with Blade Templating Engine, Idiorm, Alto Router and very helpful ```dd``` function.

### Prerequisites

All you need is PHP 7.1+ and MySQL (optional).

### Installing

1. Install required packages with composer
```bash
$ composer create-project 0xcrypto/simple-framework
```
2. Run the development server
```bash
$ php -S localhost:8000
```
3. Visit ```http://localhost:8000``` and see Simple Framework in action.

## Development
Simple Framework uses MVC and you can tinker with everything. The ```Simple``` directory contains the controllers and models. The views are outside in ```views``` directory. These views are blade templates. Routes are written in ```routes.php``` as an array which are splated into the Alto Router. Configurations are divided into two parts - ```config.php``` and ```dotenv.php```. Declarations in ```config.php``` becomes global constants available in all over the application. On the other hand, declarations in ```dotenv.php``` is accessible via config function. I know it should be the other way. I will fix it in next commit. 

## Deployment

While primarily made for shared hosting, Simple Framework can be used in any kind of enviornment as far as PHP is installed. The process is same for all kind of hosting. Just upload the codebase to your hosting and change the ```config.php``` with correct MySQL credentials.

It is okay if you upload vendor directory as well. If composer is available on your hosting environment, it is not recommended to upload vendor directory. Install packages using composer on the server.

```bash
$ composer install
```

It is recommended to keep everything out of ```public_html``` directory except the ```assets``` directory, ```index.php``` and ```.htaccess```. If you do this,
make sure you change the following lines in ```index.php```:

```php
<?php

require_once "./vendor/autoload.php";
require_once "./helpers.php";
$configurations = require_once "./config.php";
$routes = require_once "./routes.php";
```

Change to 

```php
<?php

require_once "./../simple/vendor/autoload.php";
require_once "./../simple/helpers.php";
$configurations = require_once "./../simple/config.php";
$routes = require_once "./../simple/routes.php";
```
where ```.../simple``` is where Simple has been relocated.

If relocating the codebase is not possible, you can simply upload the code and it will work. Make sure you delete the following files.

1. composer.json
2. composer.lock
3. LICENSE
4. README.md

## Built With

* [Blade Templating Engine](https://github.com/jenssegers/blade) - The templating engine used.
* [Alto Router](https://github.com/dannyvankooten/AltoRouter) - Dependency Management
* [Idiorm](https://idiorm.readthedocs.io/en/latest) - The ORM used.
* [dd](https://rometools.github.io/rome/) - Reasonable var_dumps.
* [composer](https://rometools.github.io/rome/) - Dependency Management

## Contributing

Send pull requests to [https://github.com/0xcrypto/simple](https://github.com/0xcrypto/simple).

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Vikrant Singh Chauhan** - *Developer & Maintainer* - [Follow on Twitter](https://twitter.com/0xcrypto)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
