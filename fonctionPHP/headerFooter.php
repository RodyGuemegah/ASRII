<?php

function headerASRI($sousDossier, $navBar = 1)
{
    $sousDossier = ($sousDossier == true ? '../' : '');

    ?>
    <!DOCTYPE html>
    <html class="p-0 m-0 fadeInElement" lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= $sousDossier . 'node_modules/bootstrap/dist/css/bootstrap.css' ?>">
        <script src="https://kit.fontawesome.com/c1c91a6488.js" crossorigin="anonymous"></script>
        <script src="<?= $sousDossier . 'node_modules/jquery/dist/jquery.min.js' ?>"></script>
        <script src="<?= $sousDossier . 'node_modules/sweetalert2/dist/sweetalert2.all.min.js' ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="<?= $sousDossier . 'asset/css/style.css' ?>">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>        <title>ASRII</title>
    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="#">
            <img src="asset/images/logo.png" alt="Logo">
        </a>

        <!-- Bouton pour afficher le menu sur mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenu du menu -->
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Le campus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">La vie étudiante</a>
                </li>
            </ul>
            <!-- Contenu supplémentaire si nécessaire -->
        </div>
    </div>
</nav>

        <nav class="navbar navbar-expand-sm bg-primary navbar-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">LP MIAW</a>
            </div>
        </nav>
        <nav class="navbar navbar-expand-sm bg-primary navbar-primary">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#"></a>
            </div>
        </nav>    
        <?php
}


function footerASRI($sousDossier)
{
    $sousDossier = ($sousDossier == true ? '../' : '');
    ?>
    </body>
    <script src='<?= $sousDossier . "node_modules/bootstrap/dist/js/bootstrap.js" ?>'></script>
    <footer class="site-footer text-white p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>CampChoc</h4>
                    <p>25 avenue du soleil - 91700 Sainte-Geneviève-des-Bois</p>
                    <p>Réservation: +33 (0) 160 161 786</p>
                </div>
                <div class="col-md-4">
                    <h4>Contactez-nous</h4>
                    <ul>
                        <li>Email: Camping.deLaprairie@gmail.com</li>
                        <li>Téléphone: +12345677589</li>
                        <li>Adresse: 25 avenue du soleil - 91700</li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>Liens utiles</h4>
                    <ul>
                        <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/privacy-policy/">Mentions légales</a>
                        </li>
                        <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/#contact">Contact</a></li>
                        <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/carte-emplacements">Commander</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <a href="#nav"><i class="far fa-circle-up fa-4x" style="color: #ffffff;"></i></a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">© <?= date('Y') ?> ASRII. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    </html>
    <?php
}
?>