<?php

session_start();
require 'vendor/autoload.php';
include 'inc/inc.php';

if(!isset($_SESSION['id'])){
    header("Location: /");
}

if(isset($_GET['dewhite'])){
    $iddewhite = htmlspecialchars($_GET['dewhite']);
    Users::UnWhiteListed($iddewhite);
    header("Location: /");
}

if(isset($_GET['whitelist'])){
    $idwhite = htmlspecialchars($_GET['whitelist']);
    Users::WhiteListed($idwhite);
    header("Location: /");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhitelistManager - Tableaux de bord</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
</head>
<body>
    <?php include("inc/modules/navbar.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include("inc/modules/sidebar.php"); ?>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Base</a></li>
                        <li class="breadcrumb-item active" aria-current="page">WhiteListManager</li>
                    </ol>
                </nav>
                <h1 class="h2">WhiteListManager</h1>
                <p>Gérer les utilisateurs whitelist du serveurs</p>
                
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Joueurs Whitelisté</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">Utilisateur</th>
                                            <th scope="col">Autorisation</th>
                                            <th scope="col">Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            $userswl = Users::GetUserList();
                                            
                                            foreach( $userswl as $uw ) { ?>

                                            
                                          <tr>
                                            <th scope="row"><?= $uw['name'] ?><?= $uw['whitelisted'] ?></th>
                                            <td><span class="badge <?php if(($uw['whitelisted']) == "true") echo "bg-success"; if(($uw['whitelisted']) == "false") echo "bg-danger"; ?>"><?php if(($uw['whitelisted']) == "true") echo "Whitelist"; if(($uw['whitelisted']) == "false") echo "Non autorisé"; ?></span></td>
                                            <td><a href="?<?php if(($uw['whitelisted']) == "true") echo "dewhite"; if(($uw['whitelisted']) == "false") echo "whitelist"; ?>=<?= $uw['id'] ?>" class="btn btn-sm <?php if(($uw['whitelisted']) == "true") echo "btn-danger "; if(($uw['whitelisted']) == "false") echo "btn-success"; ?>"><?php if(($uw['whitelisted']) == "true") echo "Retirer"; if(($uw['whitelisted']) == "false") echo "Ajouter"; ?></a></td>
                                          </tr>
                                          <?php
                                        }
                                        ?>
                                        </tbody>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php include("inc/modules/footer.php"); ?>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
            }, {
            low: 0,
            showArea: true
        });
    </script>
</body>
</html>