<?php 
session_start();
session_regenerate_id();
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
    $pdo = Database::connect();
    if($_POST){
        $username = $_POST["username"];
        $password = $_POST['password'];
        $req = $pdo->prepare("SELECT * FROM `user` WHERE username=?");
        $req->execute([$username]);
        $user = $req->fetch();
        if($user && password_verify($password, $user['password'])){
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];
            ?>
            <script type="text/javascript">
                    window.location.href = 'index.php';
            </script>
            <?php

    }else{
    echo "Erreur ! les données saisies sont incorrectes";
    }
        
        
    }
    Database::disconnect();
?>




    <div style="text-align:center;">
    <h2 class="mt-2">Connectez-vous</h2>
    </div>
    <form method="POST" class="m-3">
    <div class="container" >

        <div class="row">

            <div class="mb-3">
                <label for="username" class="form-label">Nom : </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Votre username">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">

            </div>
                <button type="submit" class="btn btn-success">Se connecter</button>
                <a href="./createAccount.php" class="btn btn-primary mt-2">Créer un compte</a>
        </div>



    </div>
    </form>
 
</body>
</html>