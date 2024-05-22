<?php
include 'BDD.php';

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
                            <button class="Btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" class="svgIcon">
                                    <path
                                        d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                    </path>
                                </svg>
                                <span class="icon2"></span>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>