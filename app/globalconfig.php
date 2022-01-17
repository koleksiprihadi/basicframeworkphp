<?php
$conf = new Config();

// Database MySQL
// $db = new db($conf->get_dbhost(), $conf->get_dbuser(), $conf->get_dbpass(), $conf->get_dbname());

// Session Login
// session_start();

// Cek Session Login
function sessioncek() {
  if (isset($_SESSION["id_auth"])){
    $id = $_SESSION["id_auth"];
  }else{
    header('Location: /');
  }
}