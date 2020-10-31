<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $GLOBALS['config'] = array(
        "appName" => "phpFramework",
        "version" => "0.0.1",
        "domain" => 'localhost:8080',
        "cache_enabled" => true,
        "path" => array(
            "app" => "app/",
            "cache" => "caches/",
            "core" => "core/",
            "session" => "/app/sessions",
            "index" => "index.php"
        ),
        "defaults" => array(
            "controller" => "main",
            "method" => "index",
        ),
        "routers" => array(),
        "database" => array(
            "host" => "127.0.0.1",
            "username" => "root",
            "password" => "",
            "name" => "test"
        )
    );

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $GLOBALS["instances"] = array();
    require_once $GLOBALS['config']['path']['core']."autoload.php";
    new router();
?>