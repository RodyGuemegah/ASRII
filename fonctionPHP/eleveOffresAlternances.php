<?php
include 'BDD.php';

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
<link rel="stylesheet" href="../asset/css/style.css">
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