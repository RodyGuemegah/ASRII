<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function headerASRI($sousDossier, $navBar = 1)
{
    $sousDossier = ($sousDossier == true ? '../' : '');

    ?>
    <!DOCTYPE html>
    <html class="p-0 m-0 fadeInElement" lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/c1c91a6488.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="<?= $sousDossier . 'asset/css/style.css' ?>">
        <title>ASRII</title>

    </head>


    <body>
        <?php if ($navBar): ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="<?= $sousDossier . 'asset/images/logo.png' ?>" alt="Logo">
                    </a>
                    <!-- Contenu du menu -->
                   
                </div>
            </nav>

            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light flex-wrap">
                <div class="container-fluid justify-content-center"> <!-- Ajout de la classe justify-content-center -->
                    <ul class="navbar-nav me-auto mx-auto"> <!-- Ajout de la classe mx-auto -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Présentation</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 2</a></li>
                                <li><a class="dropdown-item" href="#">Link 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Formation</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" data-bs-toggle="offcanvas"
                                        href="#offcanvasEspaceEntreprise">Link1</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="offcanvas"
                                        href="#offcanvasEspaceEntreprise">Link2</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="offcanvas"
                                        href="#offcanvasEspaceEntreprise">Link3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">AMISSIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Formation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recherche</a>
                        </li>
                    </ul>
                    <button class=" btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><i class="fa fa-bars"></i></button>

                </div>
            </nav>
        <?php endif; ?>
        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $sousDossier . 'index.php' ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Le campus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">La vie étudiante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Espace entreprise</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Link
                                    1</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Link
                                    2</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Link
                                    3</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Offcanvas pour Espace Entreprise -->
        <!-- Offcanvas pour Espace Entreprise -->


        <?php
}

// Testez la fonction en l'appelant directement pour voir si elle fonctionne
headerASRI(false, 1);
?>

    <?php


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