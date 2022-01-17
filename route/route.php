<?php
include 'app/config.php';
$conf = new Config();
$route = new Route();

// Views Loc
$dir = $conf->get_views();

// Login Loc
$loginloc = $dir."home.php";



$route->add('/',$dir."home.php");

$route->add("/user/{id}/{di}",$dir."user.php");

$route->add('/login',$loginloc);

$route->notFound($dir."404.php");
