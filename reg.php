<?php
header("Location: /");

session_start();
require 'vendor/autoload.php';
include 'inc/inc.php';


if(isset($_POST['submit-auth'])){
    $no_error = Account::CreateUser($_POST['username'], $_POST['password'], $_POST['password']);
    if ($no_error == true)
    {
        header('Location: auth');
    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à EGarageManager</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container h-100">
        <div class="row align-items-center vh-100">
            <div class="col-sm-12 col-lg-4 mx-auto">
                <!-- Form -->
                <div class="card">
                    <div class="card-body">
                        <form class="form-example" action="" method="post">
                            <center>
                                <img src="img/icon.png" alt="icon" width="80px">
                                <h3>Connexion à EGarageManager</<h3></h3>
                                <?php if (isset($no_error)) { ?>
                            <div class="alert alert-danger text-center" role="alert"><strong>Erreur:</strong> Votre nom d'utilisateur ou mot de passe est incorrect.</div>
                        <?php } ?>
                            </center>
                          <!-- Input fields -->
                          <div class="form-group mb-2">
                            <input type="text" class="form-control username" id="username" placeholder="Nom d'utilisateur" name="username">
                          </div>
                          <div class="form-group mb-3">
                            <input type="password" class="form-control password" id="password" placeholder="Mot de passe" name="password">
                          </div>
                          <button type="submit" name="submit-auth" class="btn btn-primary btn-customized mb-4 col-12">Se connecter</button>
                          <!-- End input fields -->
                          <p class="copyright" align="center">EGARAGEMANAGER &copy; 2023 made by Ihann Musitelli.</p>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>