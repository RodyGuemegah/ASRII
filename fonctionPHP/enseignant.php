<?php
include_once('../fonctionPHP/headerFooter.php'); 
headerASRI(true);

function listeSupport($E_ID){
    include "BDD.php";
    $query = $mysqli -> query("SELECT Support.*, Cours.Nom_Cours FROM Support JOIN Cours ON Support.Id_cours = Cours.Id_cours WHERE Support.Id_user = $E_ID;");
    $supportList = $query->fetch_all(MYSQLI_ASSOC);

    // Contenu HTML du formulaire
    $formHtml = '
        <form class="p-3" id="uploadForm" method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td>Matière</td>
                    <td><input type="text" name="matiere" class="form-control"></td>
                </tr>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom" class="form-control"></td>
                </tr>
                <tr>
                    <td>Fichier</td>
                    <td><input type="file" name="file_sup" id="file_sup" class="form-control"></td>
                    <input id="E_ID" name="E_ID" type="hidden" value="'.$E_ID.'" />
                </tr>
            </table>
        </form>';
    $formHtml = htmlspecialchars(json_encode($formHtml), ENT_QUOTES, 'UTF-8'); // Échapper les guillemets et convertir en JSON

    ?>
    <div class="mb-5 m-1" style="width: 98%;">
        <button class="btn btn-success float-end" onclick='swalSupportSend(<?= $formHtml ?>)'>Ajouter un support de cours</button>
    </div>
    <table class="table table-border table-hover rounded w-75 m-auto">
        <tr>
            <th>Date</th>
            <th>Support</th>
            <th>Action</th>
        </tr>
        <?php 
        foreach($supportList as $support){
            echo "<tr><td>".$support['Date_ajout']."</td>";
            echo "<td>".$support['Nom_sup']."</td>";
            echo '<td class="flex">
                      <a href="'.$support['Nom_fichier'].'" target="_blank"><i class="btn btn-default fa-regular fa-eye"></i></a>
                      <i class="btn btn-default fa-solid fa-trash" onclick="deleteSup('.$support['Id_sup'].')" style="color: #e40707;"></i>
                  </td></tr>';
        }
        ?>
    </table>
    <?php 
    echo '<script src="../js/fonction.js"></script>';
}

listeSupport(2);
?>
<script>
function swalSupportSend(content){
    Swal.fire({
        title: 'Ajouter un support de cours',
        html: content,
        showCancelButton: true,
        confirmButtonText: 'Ajouter',
        cancelButtonText: 'Annuler',
        reverseButtons: true,
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('#uploadForm');
            const formData = new FormData(form);

            const fileInput = form.querySelector('#file_sup');
            if (!fileInput.files.length) {
                Swal.showValidationMessage('Veuillez sélectionner un fichier');
                return false; // Empêcher la fermeture du Swal en cas d'erreur de validation
            }

            return { formData: formData };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = result.value.formData;

            fetch('addElement.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
        }
    });
}
</script>
