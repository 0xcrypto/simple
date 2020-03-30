<?php

if(!function_exists('view')) {
	function view($template, $args=[]) {
		$blade = new Jenssegers\Blade\Blade('views', 'cache');
		return $blade->make($template, $args)->render();
	}
}

if(!function_exists('config')) {
	function config($configstring) {
		$config = explode('.', $configstring);
		$dotenv = require_once "dotenv.php";
		foreach($config as $conf) {
			try {
				$dotenv = $dotenv[$conf];
			} catch (\Throwable $e) {
				return $dotenv;
			}
		}

		return $dotenv;
	}
}

