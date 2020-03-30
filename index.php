<?php

require_once "./vendor/autoload.php";
require_once "./helpers.php";
$configurations = require_once "./config.php";
$routes = require_once "./routes.php";

foreach ($configurations as $key => $configuration) {
	define($key, $configuration);
}

\ORM::configure('mysql:host='.DB_HOST.';dbname='.DB_NAME);
\ORM::configure('username', DB_USER);
\ORM::configure('password', DB_PASS);

$router = new AltoRouter();
foreach($routes as $route) {
	$router->map(...$route);
}

$match = $router->match();

if ($match === false) {
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
} else {
	if(is_callable( $match['target'])) {
		echo call_user_func_array( $match['target'], $match['params'] );
	} else {
		$controller = explode('#', $match['target']);
		$controllername = '\Simple\Controller\\'.$controller[0];
		echo (new $controllername)->{$controller[1]}(...$match['params']);
	}	
}
