<?php
include 'BDD.php';

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