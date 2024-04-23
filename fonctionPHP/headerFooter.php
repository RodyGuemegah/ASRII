<?php

function headerASRI($sousDossier,$navBar=1)
{
$sousDossier=($sousDossier == true ? '../' : '');

?>
    <!DOCTYPE html>
    <html class="p-0 m-0 fadeInElement" lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= $sousDossier.'node_modules/bootstrap/dist/css/bootstrap.css'?>">
        <script src="https://kit.fontawesome.com/c1c91a6488.js" crossorigin="anonymous"></script>
        <script src="<?= $sousDossier.'node_modules/jquery/dist/jquery.min.js'?>"></script>
        <script src="<?= $sousDossier.'node_modules/sweetalert2/dist/sweetalert2.all.min.js'?>"></script>
        <link rel="stylesheet" href="<?= $sousDossier.'asset/css/style.css'?>">
        <title>ASRII</title>
    </head>
    <body>
        <nav class="bg-danger">
    lore
        </nav>
    <?php
}


function footerASRI($sousDossier)
{
    $sousDossier=($sousDossier == true ? '../' : '');
    ?>
    </body>
    <script src='<?= $sousDossier."node_modules/bootstrap/dist/js/bootstrap.js" ?>'></script>
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
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/privacy-policy/">Mentions légales</a></li>
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/#contact">Contact</a></li>
                            <li><a href="https://camping-rd-l5xebmpq2s.live-website.com/carte-emplacements">Commander</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <a href="#nav" ><i class="far fa-circle-up fa-4x" style="color: #ffffff;"></i></a>
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