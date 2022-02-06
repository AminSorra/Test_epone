<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Test epone</title>
</head>

<body>
    
    <?php

    include "./database.php";
    $db = Database::connect();

    if (key_exists("username", $_SESSION) && key_exists("id", $_SESSION)) {

        echo "<center> <p>Bienvenue {$_SESSION['username']} </p> </center>"; ?>
        
        
            <a href='logOut.php' class='btn btn-danger m-2'> <i class="fas fa-power-off"></i> Déconnexion </a>
            <p onclick='correction()' id="correct">Cet frase é male aicrite</p>

    <?php
    } else { ?>
        <a href='./login.php' class='btn btn-info'>Se connecter</a>
        <a href='./createAccount.php' class='btn btn-sucess'>Créer un compte</a>
    <?php } ?>

    <div class="container d-flex justify-content-around flex-wrap" style="margin-top:70px;">

        <?php
        
        Database::disconnect();
        ?>




    </div>
    <!-- <footer style="color:white;border: 1px solid rgba(0,0,0,.125);background: rgb(154,153,179);
            background: linear-gradient(90deg, rgba(154,153,179,1) 0%, rgba(134,141,142,1) 0%, rgba(1,1,1,1) 100%, rgba(233,232,232,1) 100%, rgba(241,244,244,1) 100%);height:50px;">
            <div style="display:flex; justify-content:center; align-items:center;">
            <p><i class="far fa-copyright"></i> 2021 TWEETIZ par Osman </p>
            </div>
    </footer> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>

</html>