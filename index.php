<?php
// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure le fichier headerFooter.php
include_once ('fonctionPHP/headerFooter.php');
// Afficher le header
headerASRI(false, 1);
?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
        <div class="card m-5 p-5">
                <a id="haut"></a>
                <h4 class="head text-center">
                    <i class="bi bi-geo-alt"></i>
                    Présentation de la formation
                </h4>
                <div class="container">
                    <p>
                        Le parcours ASR2I de la licence professionnelle MIAW se concentre sur l'Administration et la Sécurisation des Réseaux et Services Internet et Intranet. 
                        Il prépare les étudiants à gérer un parc informatique, superviser et sécuriser un réseau local, ainsi qu'à intégrer des produits et services Intranet et/ou Internet. 
                        Les postes ciblés se situent à mi-chemin entre techniciens supérieurs et ingénieurs. 
                        À la fin de ce parcours, les étudiants acquièrent les compétences suivantes : 
                        <ul>
                            <li>Modélisation des données pour une meilleure intégration des services web.</li>
                            <li>Conception et réalisation de sites web Intranet et Internet, ainsi que de CMS.</li>
                            <li>Programmation côté client et serveur.</li>
                            <li>Configuration d'un réseau local pour un ensemble de postes informatiques, dans un environnement hétérogène (Windows, Linux), et interconnexion avec l'extérieur.</li>
                            <li>Administration quotidienne d'un parc hétérogène de postes serveurs et bureautiques liés au réseau informatique pour garantir disponibilité et sécurité.</li>
                            <li>Intégration de solutions de sécurité des applications et des données.</li>                 
                        </ul>
                    </p>
                </div>
            </div>

            <div class="card m-5 p-5">
                <a id="haut"></a>
                <h4 class="head text-center">
                    <i class="bi bi-geo-alt"></i>
                    Les Programmes de la formation
                </h4>
                <br>
                <!-- Tronc commun -->
                <!-- <button class="btn btn-primary" id="toggleProgramText">Le tronc commun</button> -->
                <button class="btn btn-primary" onclick="toggleProgram('programText1')">Le tronc commun</button>
                <div class="container">
                    <p>

                        <ul id="programText1" class="sub-heading" style="display: none;"> 
                            <h6>Communication et Connaissance de l'Entreprise</h6>
                            <ul>
                                <li>Communication et technique de recherche d'emploi</li>
                                <li>Gestion et management de projets</li>
                                <li>Organisation et Gestion des Entreprises</li>
                                <li>Anglais</li>
                            </ul>

                            <h6>Intégration des réseaux locaux et développement intranet et internet</h6>
                            <ul>
                                <li>Réseaux Informatiques</li>
                                <li>Outils de configurations systèmes et virtualisations</li>
                                <li>Programmation objets en Python</li>
                                <li>Bases de données relationnnelles</li>
                            </ul>

                            <h6>Développement des services WEB intranet et internet</h6>
                            <ul>
                                <li>Programmation des services Web</li>
                                <li>Développement en HTML, CSS, JavaScript, PHP, XML ...</li>
                                <li>Conception des sites internet, CMS, WP, Joomla</li>
                            </ul>
                        </ul>
                    </p>                  
                    </p>
                </div>

                <!-- <button class="btn btn-primary" id="toggleProgramText">ASRII</button> -->
                <button class="btn btn-primary" onclick="toggleProgram('programText2')">Matière spécifique au ASRII</button>

                <div class="container">
                <p>

                    <ul id="programText2" class="sub-heading" style="display: none;"> 
                        <ul>
                            <li>Sécurité Réseaux et des Applications</li>
                            <li>Interconnexion des réseaux locaux</li>
                            <li>Programmation systèmes / Suopervision</li>
                            <li>Administration et Configuration des Services Intranet et Internet ( Windows / Linux )</li>
                            <li>Projets tuteurés</li>
                        </ul>
                    </ul>
                </p>                  
                
                </div>
            </div>

            <div class="card m-5 p-5 ">
                <a id="prj"></a>
                <h4 class="text-center">La Formations ASRII</h4>
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Débouchée professionels</h4>
                                    </div>
                                    <p class="card-text">Vous trouverez ici tout mes projet effectuer au cours de mes
                                        deux années.
                                    </p>
                                </div>
                                <a href="projetFormation.html" class="btn btn-secondary btn-lg btn-block">En savoir
                                    plus</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Admissions</h4>
                                    </div>
                                    <p class="card-text">Vous trouverez ici tout mes projet effectuer au cours de mes
                                        deux années de
                                        Stage.</p>
                                </div>
                                <a href="projetFormation.html" class="btn btn-secondary btn-lg btn-block">En savoir
                                    plus </a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Contact</h4>
                                    </div>
                                    <p class="card-text">Vous trouverez ici tout mes projet effectuer au cours de mes
                                        deux années de
                                        Stage.</p>
                                </div>
                                <a href="projetFormation.html" class="btn btn-secondary btn-lg btn-block">En savoir
                                    plus</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Contact</h4>
                                    </div>
                                    <p class="card-text">Vous trouverez ici tout mes projet effectuer au cours de mes
                                        deux années de
                                        Stage.</p>
                                </div>
                                <a href="projetFormation.html" class="btn btn-secondary btn-lg btn-block">En savoir
                                    plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card m-5 p-5">
                <h4 class="text-center"><i class="fa-solid fa-location-arrow"></i>Lieu de la formation</h4>

                <img class="card-img-top" src="asset/images/iut.jfif" alt="Card image" style="width:100%">
                <p>Contenu de la quatrième carte.</p>


                <h4 class="text-center"> <i class="fa-solid fa-location-arrow"></i>
                    Département</h4>
                <p>Contenu de la quatrième carte.</p>

                <h4 class="text-center"><i class="fa-solid fa-user-tie"></i>Responsables</h4>
                <p>Contenu de la quatrième carte.</p>

                <h4 class="text-center"><i class="fa-solid fa-envelope"></i>Contacts</h4>
                <p>Contenu de la quatrième carte.</p>

                <h4 class="text-center"><i class="fa-solid fa-business-time"></i>Durée de formation</h4>
                <p>Contenu de la quatrième carte.</p>
                <a href="#" class="btn btn-primary btn-block apply-button">Postuler maintenant</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Fonction pour basculer la visibilité du texte
    function toggleProgram(id) {
                var programText = document.getElementById(id);
                if (programText.style.display === "none") {
                    programText.style.display = "block";
                } else {
                    programText.style.display = "none";
                }
    }

    // Écouteur d'événements pour le clic sur le bouton
    document.getElementById("toggleProgramText").addEventListener("click", toggleProgramText);
</script>

<?php
// Vérifier si la fonction footerASRI existe
if (function_exists('footerASRI')) {
    footerASRI(false, '');
} else {
    echo "<p>La fonction footerASRI n'est pas définie dans headerFooter.php</p>";
}
?>
