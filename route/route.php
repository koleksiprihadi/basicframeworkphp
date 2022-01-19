<?php
include 'app/config.php';
$conf = new Config();
$route = new Route();

// Views Loc
$dirv = $conf->get_views();

// Process Loc
$dirp = $conf->get_process();



// Mulai Tambahakan Route anda dari sini


$route->add('/',$dirv."home.php");

$route->add("/user",$dirv."user.php");


// Aktifkan route dibawah jika ingin menggunakan fitur login

// $route->add('/login',$dirv.'pgLogin.php');

// $route->add('/logout',$dirv.'pgLogout.php');

// $route->add('/auth/{aksi}',$dirp."prosesAuth.php");


// Route Error

$route->notFound($dirv."404.php");
