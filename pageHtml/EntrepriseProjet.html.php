<?php
include '../fonctionPHP/BDD.php';
include_once ('../fonctionPHP/headerFooter.php');
headerASRI(true);

// Récupérer les données des projets tuteurés depuis la base de données
$sql = "SELECT `Contenu_pro`, `Nom`, `Mail` FROM `Projet` INNER JOIN `User` ON Projet.Id_user = User.Id_user WHERE Validation_prj = 1;";
$result = mysqli_query($mysqli, $sql);

// Récupérer les données du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contenu_pro = mysqli_real_escape_string($mysqli, $_POST['Contenu_pro']);
    $nom = mysqli_real_escape_string($mysqli, $_POST['Nom']);
    $mail = mysqli_real_escape_string($mysqli, $_POST['Mail']);
    $id_user = $_SESSION['Id_user']; // Récupération de l'Id_user depuis la session

    // Préparer la requête SQL
    $sql = "INSERT INTO `Projet`(`Contenu_pro`, `Nom`, `Mail`, `Id_user`, `Validation_prj`)
            VALUES ('$contenu_pro', '$nom', '$mail', '$id_user', 0)";

    // Exécuter la requête
    if (mysqli_query($mysqli, $sql)) {
        echo "Le projet tuteuré a été ajouté avec succès.";
    } else {
        echo "Erreur : " . mysqli_error($mysqli);
    }
}
?>


<style>
        /* Style pour le pop-up */
        .modal {
    display: none;
    position: fixed;
    z-index: 1100;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4); /* Fond semi-transparent */
}
.modal-dialog {
    margin: 15% auto;
    max-width: 600px;
}
.modal-content {
    background-color: #fefefe;
    padding: 20px;
    border: 1px solid #888;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}
.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.modal-title {
    margin: 0;
    font-size: 1.5em;
}
.btn-close {
    background: none;
    border: none;
    font-size: 1.5em;
    cursor: pointer;
}
.modal-body {
    margin-top: 10px;
}
.modal-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
}
.btn-primary, .btn-secondary {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    font-size: 1em;
}
.btn-primary {
    background-color: #234595; /* Modifier selon vos besoins */
    color: white;
}
.btn-secondary {
    background-color: #f44336; /* Modifier selon vos besoins */
    color: white;
}
.btn-primary:hover, .btn-secondary:hover {
    opacity: 0.8;
}

.close {
    position: relative;
    width: 24px;
    height: 24px;
    background-color: transparent;
    border: none;
    cursor: pointer;
    outline: none;
}

.close:before,
.close:after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 20px;
    height: 2px;
    background-color: black;
}

.close:before {
    transform: translate(-50%, -50%) rotate(45deg);
}

.close:after {
    transform: translate(-50%, -50%) rotate(-45deg);
}

</style>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Projets Tutorés</title>
    <link rel="stylesheet" href="<?= $sousDossier . 'asset/css/style.css' ?>">
</head>
<body>
    <div class="container">
        <a class="btn btn-primary" href="#" id="openModal" role="button">Ajouter un Projet Tuteuré</a>
    </div>

    <!-- Pop-up (modal) pour ajouter un projet tuteuré -->
    <div id="myModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter un Projet Tuteuré</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="closeModalButton">
                    </div>
                <div class="modal-body">
                    <form id="offreForm">
                        <div class="mb-3">
                            <label for="contenu_pro" class="form-label">Description de l'offre :</label>
                            <textarea class="form-control" id="contenu_pro" name="contenu_pro" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail :</label>
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ajouter un projet tuteuré</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModalButton">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Liste des Projets Tutorés</h1>
        <table>
            <thead>
                <tr>
                    <th>Description Projet</th>
                    <th>Nom</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Contenu_pro']); ?></td>
                        <td><?php echo htmlspecialchars($row['Nom']); ?></td>
                        <td><?php echo htmlspecialchars($row['Mail']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
footerASRI(true);
?>

    <script>
    // var modal = document.getElementById("myModal");

    // // Lorsque l'utilisateur clique sur le lien, ouvrir le pop-up
    // document.getElementById("openModal").onclick = function() {
    //     modal.style.display = "block";
    //     document.querySelector('.container').style.display = 'block'; // Cacher la barre de navigation
    // }

    // // Lorsque l'utilisateur clique sur le bouton de fermeture, fermer le pop-up
    // document.getElementById("closeModalButton").onclick = function() {
    //     modal.style.display = "none";
    //     document.querySelector('.container').style.display = 'block'; // Réafficher la barre de navigation
    // }

    // // Fermer le pop-up si l'utilisateur clique en dehors de celui-ci
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //         document.querySelector('.container').style.display = 'block'; // Réafficher la barre de navigation
    //     }
    // }

    // // Soumettre le formulaire et fermer le pop-up
    // document.getElementById("offreForm").onsubmit = function(event) {
    //     event.preventDefault(); // Empêcher le comportement de soumission par défaut

    //     // Faire une requête AJAX pour envoyer les données au serveur
    //     var xhr = new XMLHttpRequest();
    //     xhr.open("POST", "traitement_projet_tuteure.php", true);
    //     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    //     // Préparer les données du formulaire
    //     var formData = new FormData(document.getElementById("offreForm"));
    //     var data = new URLSearchParams(formData).toString();

    //     xhr.onreadystatechange = function() {
    //         if (xhr.readyState === XMLHttpRequest.DONE) {
    //             if (xhr.status === 200) {
    //                 // Fermer le pop-up et réafficher la barre de navigation
    //                 modal.style.display = "none";
    //                 document.querySelector('.container').style.display = 'block';
    //                 // Optionnel: afficher un message de succès
    //                 // alert("Le projet tuteuré a été ajouté avec succès.1212");
    //                 // // Rafraîchir la page pour voir les nouveaux projets
    //                 // location.reload();
    //             } else {
    //                 // Optionnel: afficher un message d'erreur
    //                 alert("Erreur lors de l'ajout du projet tuteuré.");
    //             }
    //         }
    //     };

    //     xhr.send(data);
    // }

    document.addEventListener("DOMContentLoaded", function() {
    var modal = new bootstrap.Modal(document.getElementById('myModal'));
    var container = document.querySelector('.container');

    // Open modal
    document.getElementById("openModal").onclick = function() {
        modal.show();
        container.style.display = 'block'; // Hide the container
    };

    // Close modal using the button
    document.getElementById("closeModalButton").onclick = function() {
        modal.hide();
        container.style.display = 'block'; // Show the container
    };

    // Submit form and close modal
    document.getElementById("offreForm").onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission

        // Create and send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "traitement_projet_tuteure.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var formData = new FormData(document.getElementById("offreForm"));
        var data = new URLSearchParams(formData).toString();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    modal.hide();
                    container.style.display = 'block'; // Show the container
                    // Optionally show a success message
                    // alert("Le projet tuteuré a été ajouté avec succès.");
                    // Optionally refresh the page to see new projects
                    // location.reload();
                } else {
                    alert("Erreur lors de l'ajout du projet tuteuré.");
                }
            }
        };

        xhr.send(data);
    };

    // Close modal if user clicks outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById("myModal")) {
            modal.hide();
            container.style.display = 'block'; // Show the container
        }
    };
});
</script>
