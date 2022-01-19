<?php

$loc = $conf->get_locerrlogin();


if($params['aksi'] == 'login'){
    if(isset($_POST['authUser'])){
      auth($_POST['authUser'], $_POST['authPass']); 
    }else{
        errLogin($loc);
    }
}else{
    errLogin($loc);
}





