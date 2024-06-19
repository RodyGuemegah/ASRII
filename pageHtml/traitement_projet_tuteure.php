<?php
// Inclure le fichier de connexion à la base de données
include '../fonctionPHP/BDD.php';
session_start(); // Si vous utilisez des sessions pour récupérer l'ID de l'utilisateur

// Vérifiez que la méthode de la requête est bien POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire et échappez-les pour la sécurité
    $contenu_pro = mysqli_real_escape_string($mysqli, $_POST['contenu_pro']);
    
    // Assurez-vous que l'utilisateur est connecté et que l'ID de l'utilisateur est dans la session
    if (isset($_SESSION['U_ID'])) {
        $id_user = $_SESSION['U_ID'];

        // Préparez la requête SQL pour insérer les données
        $sql = "INSERT INTO `Projet`(`Contenu_pro`, `Id_user`, `Validation_prj`)
                VALUES ('$contenu_pro','$id_user', 0)";

        // Exécutez la requête et vérifiez le résultat
        if (mysqli_query($mysqli, $sql)) {
            echo "Le projet tuteuré a été ajouté avec succès.";
        } else {
            echo "Erreur : " . mysqli_error($mysqli);
        }
    } else {
        echo "Erreur : Utilisateur non connecté.";
    }
} else {
    echo "Erreur : Méthode de requête invalide.";
}
?>
