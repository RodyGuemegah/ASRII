<?php
// Afficher les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure le fichier headerFooter.php
include_once ('fonctionPHP/headerFooter.php');

// Vérifier si la fonction headerASRI existe
if (function_exists('headerASRI')) {
    headerASRI(false, '');
} else {
    echo "<p>La fonction headerASRI n'est pas définie dans headerFooter.php</p>";
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card m-5 p-5">
                <a id="haut"></a>
                <h4 class="head text-center">
                    <i class="bi bi-geo-alt"></i>
                    Programmes
                </h4>
                <button class="btn btn-primary" id="toggleProgramText">Consulter le programmes de la formation</button>
                <div class="container">
                    <p id="programText" class="sub-heading" style="display: none;">
                        I'm studying for a professional degree in IT and
                        I'm passionate about software development.
                        As a student deeply passionate about development,
                        I find myself continually immersed in the ever-evolving world of technology.
                        From the moment I wrote my first line of code,
                        I was captivated by the power to create and innovate.
                        This passion has become the driving force behind my academic pursuits and personal projects.
                        I approach each task with enthusiasm and a hunger for knowledge.
                        My aim is to utilize those skills to make meaningful contributions to society through software
                        development.
                        Software development is not just a job title; it’s a lifestyle.
                        Beyond the technical aspects,
                        I am drawn to the collaborative nature of software development.
                        Working in teams, sharing ideas, and learning from others is an enriching experience that fuels
                        my growth as
                        a developer.
                        In addition to coding, I am also keenly interested in staying updated with industry trends,
                        attending
                        workshops, and participating in hackathons.
                        My goal is to continue developing skills that will allow me to contribute positively to society
                        through
                        programming.
                        Motivated, rigorous and a team player. I aspire to became a full-stack development engineer.</p>
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
    function toggleProgramText() {
        var programText = document.getElementById("programText");
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
