<?php
include 'app/config.php';
$conf = new Config();
$route = new Route();

// Mulai Tambahakan Route anda dari sini
// $route->addView([route], [file], [title]);
// $route->addProcess([route], [file], [title]);


$route->addView('/',"home.php", "home");

$route->addView("/user","user.php", "home");


// Aktifkan route dibawah jika ingin menggunakan fitur login

// $route->addView('/login','pgLogin.php', 'login');

// $route->addView('/logout','pgLogout.php', 'logout');

// $route->addProcess('/auth/{aksi}',"prosesAuth.php" 'authentication');


// Route API
// $route->addApi([route], [file], [method]);

$route->addApi('/api/registrasi', 'regis.php', 'POST');

$route->addApi('/api/login', 'login.php', 'POST');

$route->addApi('/api/getdatawithauth', 'getData.php', 'POST');

$route->addApi('/api/getdatanoauth', 'getDataNoAuth.php', 'POST');


// Route Error

$route->notFound("404.php");
