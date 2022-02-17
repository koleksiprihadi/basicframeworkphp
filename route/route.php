<?php
include 'app/config.php';
$conf = new Config();
$route = new Route();

// Mulai Tambahakan Route anda dari sini


$route->addView('/',"home.php");

$route->addView("/user","user.php");


// Aktifkan route dibawah jika ingin menggunakan fitur login

// $route->addView('/login','pgLogin.php');

// $route->addView('/logout','pgLogout.php');

// $route->addProcess('/auth/{aksi}',"prosesAuth.php");


// Route Error

$route->notFound("404.php");
