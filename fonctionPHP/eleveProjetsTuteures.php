<?php
include 'BDD.php';

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