<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
function headerASRI($sousDossier, $navBar = 1)
{
    $sousDossier = ($sousDossier == true ? '../' : '');
    require_once($sousDossier . 'fonctionPHP/identification.php');
    if (Veriflogin()) {
        $id = GetU_ID();
        $droits = Get_droits($id);
        $_SESSION['U_ID'] = $id;
        $_SESSION['Privilege'] = Get_droits($id);
    } else {
        $id = '';
        $droits = '';
    }
?>
    <!DOCTYPE html>
    <html class="p-0 m-0 fadeInElement" lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="<?= $sousDossier . 'node_modules/jquery/dist/jquery.min.js' ?>"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= $sousDossier . 'node_modules/bootstrap/dist/css/bootstrap.min.css' ?>">
        <!-- FontAwesome -->
        <script src="https://kit.fontawesome.com/c1c91a6488.js" crossorigin="anonymous"></script>
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= $sousDossier . 'asset/css/style.css' ?>">
        <title>ASRII</title>
    </head>

    <body>
        <?php if ($navBar) : ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div id="menuhaut" class="container-fluid">
                    <!-- Logo -->
                    <a class="navbar-brand" href="<?= $sousDossier . 'index.php' ?>">
                        <img src="<?= $sousDossier . 'asset/images/logo.png' ?>" alt="Logo">
                    </a>
                    <!-- Contenu du menu -->
                </div>
            </nav>

            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light flex-wrap">
                <div class="container-fluid justify-content-center">
                    <ul class="navbar-nav me-auto mx-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Présentation</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="#">Link 2</a></li>
                                <li><a class="dropdown-item" href="#">Link 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ADMISSIONS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Formation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Recherche</a>
                        </li>
                        <li class="nav-item" style="display: flex;">
                            <?php if (Veriflogin()) echo '<i onclick="swalDeconnexion()" class="fa-solid fa-right-from-bracket fa-lg m-auto"></i>';
                            else echo "<a class='nav-link' href='" . $sousDossier . "pageHtml/Connexion.html.php?inscrit=1'>Se connecter</a>"; ?>
                        </li>
                    </ul>
                    <?php
                    if ($droits != '') {
                        if ($droits == 1){?>
                            <ul class="navbar-nav mr-2" style="margin-right: 50px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Espace Administrateur</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Recrutez en alternance</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHtml/formEntreprise.html.php' ?>">Déposez une offre
                                                d'alternance</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Déposer un projet tutoré</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php }

                        if ($droits == 2){?>
                            <ul class="navbar-nav mr-2" style="margin-right: 50px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Espace entreprise</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="<?= $sousDossier . 'pageHtml/EntrepriseProjet.html.php' ?>">Projets tuteurés</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHtml/EntrepriseAlternance.html.php' ?>">Offres d'Alternances</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php }
                        if ($droits == 3){?>
                            <ul class="navbar-nav mr-2" style="margin-right: 50px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Espace enseignant</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'fonctionPHP/enseignant.php?page=cours&id='.$id ?>">Créer un support de cours</a></li>
                                        <li><a class="dropdown-item"  href="<?= $sousDossier . 'fonctionPHP/enseignant.php?page=note&id='.$id ?>">Ajouter une note</a></li>
                                        <li><a class="dropdown-item"  href="<?= $sousDossier . 'fonctionPHP/enseignant.php?page=edt&id='.$id ?>">Emploi du temps </a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php }
                        if ($droits == 4){?>
                            <ul class="navbar-nav mr-2" style="margin-right: 50px;">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Espace etudiant</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHTML/votreEspace.php?page=Note' ?>">Note</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHTML/votreEspace.php?page=Emplois' ?>">Emplois du temps</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHTML/votreEspace.php?page=Support' ?>">Support de cours</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHTML/votreEspace.php?page=Projet' ?>">Voir les projets tutorés</a></li>
                                        <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHTML/votreEspace.php?page=OffreAlt' ?>">Voir les offres d'alternances</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php }
                    }
                    ?>
                    <button2 class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"><i class="fa fa-bars"></i></button2>
                </div>
            </nav>
        <?php endif; ?>

        <!-- Offcanvas Navbar -->
        <div class="offcanvas offcanvas-start text-bg-primary" id="offcanvasNavbar" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
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
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Recrutez en alternance</a></li>
                            <li><a class="dropdown-item" href="<?= $sousDossier . 'pageHtml/formEntreprise.html.php' ?>">Déposez une offre
                                    d'alternance</a></li>
                            <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasEspaceEntreprise">Déposer un projet tutoré</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    <?php
}

function footerASRI($sousDossier)
{
    $sousDossier = ($sousDossier ? '../' : '');
    ?>
        <!-- jQuery -->
        <script src="<?= $sousDossier . 'node_modules/jquery/dist/jquery.min.js' ?>"></script>
        <script src="<?= $sousDossier . 'js/fonction.js' ?>"></script>
        <!-- Bootstrap JS -->
        <script src="<?= $sousDossier . 'node_modules/sweetalert2/dist/sweetalert2.all.min.js' ?>"></script>
        <script src="<?= $sousDossier . 'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
        <footer class="site-footer text-white p-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h4>Universités d'Evry</h4>
                        <p> 23 Bd François Mitterrand, 91000 Évry-Courcouronnes</p>
                        <p>Contact:+33 01 69 47 70 00</p>
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
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/privacy-policy/">Mentions légales</a></li>
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/#contact">Contact</a></li>
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/carte-emplacements">Commander</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <a href="#navbar"><i class="far fa-circle-up fa-4x" style="color: #ffffff;"></i></a>
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
    </body>

    </html>
<?php
}
?>