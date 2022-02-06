<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
?>
<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
<?php  
    include "./database.php";
    
    if($_POST){
        $username = $_POST["username"];
        $password = $_POST["password"];
            if(strlen($username) > 3 && strlen($_POST['password']) > 5){
                $pdo = Database::connect();

                $req = $pdo->prepare("SELECT username FROM `user` WHERE username=?");
                $req->execute([$username]);
                $user = $req->fetch();
                if($user){
                    echo "<center class='text-danger'> Ce nom d'utilisateur existe déjà ! </center>";
                }else{

                $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
                $req = $pdo->prepare("INSERT INTO `user` (username, password) VALUES (:username, :password)");
                $req->bindParam(":username", $username, PDO::PARAM_STR);
                $req->bindParam(":password", $encryptedPassword, PDO::PARAM_STR);
                $req->execute();

                $_SESSION['username'] = $username;
                $_SESSION['id'] = $account['id'];
                
                ?>
                <script type="text/javascript">
                    window.location.href = 'login.php';
                </script>
                <?php

                }
                Database::disconnect();
                }else{
                    echo "<p> Erreur ! les données saisies ne respectes pas les règles, Veuillez ressayer </p>";
                }
        }
?>






    <div style="text-align:center;">
        <h2 class="mt-2">Inscrivez-vous</h2>
    </div>
    <form method="POST" class="m-3">
    <div class="container">

        <div class="row">

            <div class="mb-3">
                <label for="username" class="form-label">Nom : </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Votre username">
                <div id="username" class="form-text">Votre nom doit contenir plus de 3 caractères</div>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                <div id="password" class="form-text">Votre mot de passe doit contenir plus de 5 caractères</div>

            </div>
                <button type="submit" class="btn btn-success">Créer un compte</button>
                <a href="./login.php" class="btn btn-primary mt-2">Se connecter</a>
        </div>



    </div>
    </form>


</body>
</html>