<?php
if (is_file('config.php')) {
    require_once('config.php');
}


function __autoload($class)
{
    $path = "classes/{$class}.php";
    if (is_file($path))
        include_once($path);
    $path = "models/{$class}.php";
    if (is_file($path)){
        include_once($path);
    }
    $path="controllers/{$class}.php";
    if (is_file($path)){
        include_once($path);
    }
}

DataBase::Connect();
Session::init();
Router::start();
?>