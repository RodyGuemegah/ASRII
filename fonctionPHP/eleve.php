<?php
include 'BDD.php';

if (isset($_GET['page']) && $_GET['page'] == "Emplois") {
    // Requête SQL
    $sql = "SELECT `Nom_fichier`,`Date` FROM `Emplois_du_temps` ORDER BY `Date` DESC;";

    // Exécution de la requête et récupération des résultats
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Stockage des résultats dans une variable
        $emps = array();
        while ($row = $result->fetch_assoc()) {
            $emps[] = $row;
        }
    } else {
        $emps = array();
    }

    // Fermeture de la connexion
    $mysqli->close();
    ?>
    <div class="table-wrap">
        <table class="tableSup">
            <thead class="thead-primary">
                <tr>
                    <th class="colNom">Emplois du temps du mois de</th>
                    <th class="colTel">Télécharger</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($emps as $emp):
                    ?>
                    <tr>
                        <th scope="row"><?php
                            $formatter = new IntlDateFormatter(
                                'fr_FR', 
                                IntlDateFormatter::NONE, 
                                IntlDateFormatter::NONE, 
                                null, 
                                null, 
                                'MMMM yyyy'
                            );
                            echo $formatter->format(strtotime($emp['Date']));
                        ?></th>
                        <td style="text-align: center;font-size: 0.5em;">
                            <div style="display: inline-block;">
                                <a href="../emploisDuTemps/<?php echo htmlspecialchars($emp['Nom_fichier']); ?>" download>
                                    <button class="Btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" class="svgIcon">
                                            <path
                                                d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                            </path>
                                        </svg>
                                        <span class="icon2"></span>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

if (isset($_GET['page']) && $_GET['page'] == "Note") {
    if (empty($_COOKIE['token'])) {
        echo "<script>window.location.href = '../';</script>";
        exit(); 
    }

    $token = $_COOKIE['token'];

    // Requête SQL
    $sql = "SELECT `Contenu_note`, `Nom_cours`, `Note` FROM `Notes` INNER JOIN `Cours` ON Notes.Id_cours = Cours.Id_cours INNER JOIN `User` ON Notes.Id_user = User.Id_user WHERE Token = ?;";

    // Préparer la déclaration
    $stmt = $mysqli->prepare($sql);

    // Vérifier la préparation de la requête
    if ($stmt === false) {
        die('Erreur de préparation de la requête : ' . $mysqli->error);
    }

    // Lier la variable à la déclaration préparée
    $stmt->bind_param("s", $token);

    // Exécuter la déclaration
    $stmt->execute();

    // Récupérer les résultats
    $result = $stmt->get_result();

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Stocker les résultats dans une variable
        $notes = array();
        while ($row = $result->fetch_assoc()) {
            $notes[] = $row;
        }
    } else {
        $notes = array();
    }

    // Fermer la déclaration
    $stmt->close();

    // Fermer la connexion
    $mysqli->close();
    ?>
    <div class="table-wrap">
        <table class="tableSup">
            <thead class="thead-primary">
                <tr>
                    <th class="colNom">Nom de la note</th>
                    <th class="colTel">Cours de la note</th>
                    <th class="colTel">Note</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentCourse = null;
                foreach ($notes as $note):
                    ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($note['Contenu_note']); ?></th>
                        <td><?php echo htmlspecialchars($note['Nom_cours']); ?></td>
                        <td><?php echo htmlspecialchars($note['Note']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

if (isset($_GET['page']) && $_GET['page'] == "OffreAlt") {
    // Requête SQL
    $sql = "SELECT `Contenu_alt`, `Nom`, `Prenom`, `Mail` FROM `Offre_alternance` INNER JOIN `User` ON Offre_alternance.Id_user = User.Id_user;";

    // Exécution de la requête et récupération des résultats
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Stockage des résultats dans une variable
        $offreAlt = array();
        while ($row = $result->fetch_assoc()) {
            $offreAlt[] = $row;
        }
    } else {
        $offreAlt = array();
    }

    // Fermeture de la connexion
    $mysqli->close();
    ?>
    <div class="table-wrap">
        <table class="tableSup">
            <thead class="thead-primary">
                <tr>
                    <th class="colNom">Contenue de l'offre d'alternance</th>
                    <th class="colTel">Déposer par</th>
                    <th class="colTel">Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentCourse = null;
                foreach ($offreAlt as $alter):
                    ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($alter['Contenu_alt']); ?></th>
                        <td><?php echo htmlspecialchars($alter['Nom']); ?></td>
                        <td><?php echo htmlspecialchars($alter['Mail']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

if (isset($_GET['page']) && $_GET['page'] == "Projet") {
    // Requête SQL
    $sql = "SELECT `Contenu_pro`, `Nom`, `Prenom`, `Mail` FROM `Projet` INNER JOIN `User` ON Projet.Id_user = User.Id_user;";

    // Exécution de la requête et récupération des résultats
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Stockage des résultats dans une variable
        $projets = array();
        while ($row = $result->fetch_assoc()) {
            $projets[] = $row;
        }
    } else {
        $projets = array();
    }

    // Fermeture de la connexion
    $mysqli->close();
    ?>
    <div class="table-wrap">
        <table class="tableSup">
            <thead class="thead-primary">
                <tr>
                    <th class="colNom">Contenue du projet</th>
                    <th class="colTel">Déposer par</th>
                    <th class="colTel">Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentCourse = null;
                foreach ($projets as $projet):
                    ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($projet['Contenu_pro']); ?></th>
                        <td><?php echo htmlspecialchars($projet['Nom']); ?></td>
                        <td><?php echo htmlspecialchars($projet['Mail']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php }

if (isset($_GET['page']) && $_GET['page'] == "Support") {
    // Requête SQL
    $sql = "SELECT `Nom_sup`, `Nom_Cours`, `Nom_fichier`, `Date_ajout` FROM `Support` INNER JOIN `Cours` ON Support.Id_cours = Cours.Id_cours ORDER BY `Nom_Cours`;";

    // Exécution de la requête et récupération des résultats
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Stockage des résultats dans une variable
        $supports = array();
        while ($row = $result->fetch_assoc()) {
            $supports[] = $row;
        }
    } else {
        $supports = array();
    }

    // Fermeture de la connexion
    $mysqli->close();
    ?>
    <div class="table-wrap">
        <table class="tableSup">
            <thead class="thead-primary">
                <tr>
                    <th class="colNom">Nom du support</th>
                    <th>Date</th>
                    <th class="colTel">Télécharger</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $currentCourse = null;
                foreach ($supports as $support):
                    if ($currentCourse !== $support['Nom_Cours']):
                        if ($currentCourse !== null): ?>
                            <!-- Fermeture de la table précédente -->
                        <?php endif; ?>
                        <!-- Nouvelle ligne de cours -->
                        <tr>
                            <th class="rowCour" colspan="3" scope="row">Cours de
                                <?php echo htmlspecialchars($support['Nom_Cours']); ?></th>
                        </tr>
                        <?php
                        $currentCourse = $support['Nom_Cours'];
                    endif;
                    ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($support['Nom_sup']); ?></th>
                        <td><?php echo htmlspecialchars($support['Date_ajout']); ?></td>
                        <td style="text-align: center;font-size: 0.5em;">
                            <div style="display: inline-block;">
                                <a href="../supportCours/<?php echo htmlspecialchars($support['Nom_fichier']); ?>" download>
                                    <button class="Btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" class="svgIcon">
                                            <path
                                                d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                            </path>
                                        </svg>
                                        <span class="icon2"></span>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php } ?>