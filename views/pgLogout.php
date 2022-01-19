<?php sessioncek();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'app/link-css.php';?>
</head>
<body>
    <!-- Code Html anda disini -->
    <?php include 'app/link-javascripts.php';?>
</body>
</html>



<?php
session_destroy();
header('Location: /login');