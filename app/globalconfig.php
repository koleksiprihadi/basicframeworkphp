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
    header('Location: /login');
  }
}

// Fungsi Auth
function auth($authUser, $authPass){
    $conf = new Config();
    $db = new db($conf->get_dbhost(), $conf->get_dbuser(), $conf->get_dbpass(), $conf->get_dbname());
    $user = $authUser;
    $akun = $db->query("SELECT * FROM akun WHERE Auser = '$user'")->fetchArray();

    if($akun['Auser'] != Null){
        if($akun['Auser'] == $authUser && $akun['Apass']==$authPass){
            $_SESSION["id_auth"] = $akun['id'];
            echo "<script type='text/javascript'>
                  location.replace('".$conf->get_locsukseslogin()."');
                  </script>";
        }else{
            echo "<script type='text/javascript'>
                  location.replace('/login');
                  </script>";
        }
    }else{
        echo "<script type='text/javascript'>
              location.replace('/login');
              </script>";
    }
}

function errLogin($loc) {
  echo "<script type='text/javascript'>
  location.replace('$loc');
  </script>";
}


