<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $GLOBALS['config'] = array(
        "appName" => "phpFramework",
        "version" => "0.0.1",
        "domain" => 'phpframework.com',
        "path" => array(
            "app" => "app/",
            "core" => "core/",
            "index" => "index.php"
        ),
        "defaults" => array(
            "controller" => "main",
            "method" => "index",
        ),
        "routers" => array(),
        "database" => array(
            "host" => "localhost",
            "username" => "",
            "password" => "",
            "name" => ""
        )
    );
    $GLOBALS["instances"] = array();
    require_once $GLOBALS['config']['path']['core']."autoload.php";
    new router();
?>