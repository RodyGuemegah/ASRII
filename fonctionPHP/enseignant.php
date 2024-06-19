<?php
include_once('../fonctionPHP/headerFooter.php');
headerASRI(true);
if (isset($_GET['id'])) $id = $_GET['id'];
if (isset($_GET['page']) && $_GET['page'] != '') $page = $_GET['page'];
else $page = 'cours';

//REDIRECTION SUR LES PAGES
switch ($page) {
    case 'cours':
        listeSupport($id);
        break;

    case 'edt':
        Edt($id);
        break;

    case 'note':
        note($id);
        break;

    case 'classe':
        classe($id);
        break;

    default:
        listeSupport($id);
}




function listeSupport($E_ID)
{
    include "BDD.php";
    $query = $mysqli->query("SELECT Support.*, Cours.Nom_Cours FROM Support JOIN Cours ON Support.Id_cours = Cours.Id_cours WHERE Support.Id_user = $E_ID;");
    $supportList = $query->fetch_all(MYSQLI_ASSOC);
    $queryMatiere = $mysqli->query("SELECT * FROM Cours");
    $MatiereList = $queryMatiere->fetch_all(MYSQLI_ASSOC);


    // Contenu HTML du formulaire
    $formHtml = '
        <form class="p-3" id="uploadForm" method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td>Matière</td>
                    <td><select name="matiere" class="form-select" aria-label="Choisir une matière">';
    foreach ($MatiereList as $matiere) {
        $formHtml .= '<option value="' . $matiere['Id_cours'] . '">' . $matiere['Nom_Cours'] . '</option> ';
    }

    $formHtml .= '</select>
                    </td>
                    </tr>
                <tr>
                    <td>Nom</td>
                    <td><input type="text" name="nom" class="form-control"></td>
                </tr>
                <tr>
                    <td>Fichier</td>
                    <td><input type="file" name="file_sup" id="file_sup" class="form-control"></td>
                    <input id="E_ID" name="E_ID" type="hidden" value="' . $E_ID . '" />
                    <input id="action" name="action" type="hidden" value="support" />
                </tr>
            </table>
        </form>';
    $formHtml = htmlspecialchars(json_encode($formHtml), ENT_QUOTES, 'UTF-8'); // Échapper les guillemets et convertir en JSON

?>
    <div class=" m-2 fs-4"><b>Support de cours</b></div>
    <div class="mb-5 m-1" style="width: 98%;">
        <button class="btn btn-success float-end" onclick='swalSupportSend(<?= $formHtml ?>)'>Ajouter un support de cours</button>
    </div>
    <table class="table table-border table-striped table-hover rounded w-75 m-auto mb-5">
        <tr>
            <th>Date</th>
            <th>Support</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        foreach ($supportList as $support) {
            $i++;
            echo "<tr id='$i'><td>" . $support['Date_ajout'] . "</td>";
            echo "<td>" . $support['Nom_sup'] . "</td>";
            echo '<td class="flex">
                      <a href="' . $support['Nom_fichier'] . '" target="_blank"><i class="btn btn-default fa-regular fa-eye"></i></a>
                      <i class="btn btn-default fa-solid fa-trash" onclick="deleteSup(' . $support['Id_sup'] . ',' . $i . ')" style="color: #e40707;"></i>
                  </td></tr>';
        }
        ?>
    </table>
<?php
    echo '<script src="../js/fonction.js"></script>';
}


//PERMET DE CONSULTER SON EMPLOI DU TEMPS PERSONNEL
function Edt($id)
{
    include "BDD.php";
    $query = $mysqli->query("SELECT * FROM Emplois_du_temps_enseignant WHERE Id_user = $id");
    $edts = $query->fetch_all(MYSQLI_ASSOC);
?>
    <div class=" m-2 fs-4"><b>Emploi du temps</b></div>
    <table class="table table-border table-striped table-hover rounded w-75 m-auto mb-5 mt-5">
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
        foreach ($edts as $edt) {
            $i++;
            echo "<tr id='$i'><td>" . $edt['Date'] . "</td>";
            echo "<td>" . $edt['Nom_fichier'] . "</td>";
            echo '<td class="flex">
                      <a href="../pdf/emploisDuTemps/' . $edt['Nom_fichier'] . '" target="_blank"><i class="btn btn-default fa-regular fa-eye"></i></a>
                  </td></tr>';
        }
        ?>
    </table>
<?php
    echo '<script src="../js/fonction.js"></script>';
}


//PERMET DE CONSULTER ET AJOUTER DES NOTES EN FONCTION DE SES ELEVES
function note($id)
{
    include "BDD.php";
    $query = $mysqli->query("SELECT * FROM Notes WHERE Id_user = $id");
    $edts = $query->fetch_all(MYSQLI_ASSOC);
    $queryMatiere = $mysqli->query("SELECT * FROM Cours");
    $MatiereList = $queryMatiere->fetch_all(MYSQLI_ASSOC);
    $queryEleve = $mysqli->query("SELECT * FROM User WHERE Privilege=4");
    $Eleves = $queryEleve->fetch_all(MYSQLI_ASSOC);

    $queryTable=$mysqli->query("SELECT n.*,fd.*,c.*,u.Nom,u.Prenom FROM Notes n , fait_cour_de fd, Cours c , User u WHERE fd.Id_user = $id AND n.Id_cours=fd.Id_cours AND c.Id_cours=fd.Id_cours AND n.Id_user=u.Id_user ");
    $ContentNote = $queryTable->fetch_all(MYSQLI_ASSOC);
    // Contenu HTML du formulaire
    $formHtml = '
        <form class="p-3" id="formNote" method="POST" enctype="multipart/form-data">
            <table class="table table-borderless">
                <tr>
                    <td>Matière</td>
                    <td><select name="matiere" class="form-select" aria-label="Choisir une matière">';
                    foreach ($MatiereList as $matiere) {
                        $formHtml .= '<option value="' . $matiere['Id_cours'] . '">' . $matiere['Nom_Cours'] . '</option> ';
                    }

    $formHtml .= '</select>
                    </td>
                    </tr>
                    <tr>
                    <td>Eleve</td>
                    <td><select name="eleve" class="form-select" aria-label="Choisir un élève">';
                    foreach ($Eleves as $eleve) {
                        $formHtml .= '<option value="' . $eleve['Id_user'] . '">' . $eleve['Nom'] .' '. $eleve['Prenom'] . '</option> ';
                    }

    $formHtml .= '</select>
                    </td>
                    </tr>
                <tr>
                    <td>Note</td>
                    <td><input min="0" max="100"  type="number" name="note" id="note" class="form-control"></td>
                    <input id="profId" name="profId" type="hidden" value="' . $id . '" />
                    <input id="action" name="action" type="hidden" value="note" />
                </tr>
                <tr>
                    <td>Commentaire</td>
                    <td><input type="text" name="Contenu_note" id="Contenu_note" class="form-control"></td>
                </tr>
            </table>
        </form>';
    $formHtml = htmlspecialchars(json_encode($formHtml), ENT_QUOTES, 'UTF-8'); // Échapper les guillemets et convertir en JSON
?>
    <div class=" m-2 fs-4"><b>Notes</b></div>
    <div class="mb-5 m-1" style="width: 98%;">
        <button class="btn btn-success float-end mt-1" onclick='swalNoteSend(<?= $formHtml ?>)'>Ajouter une note</button>
    </div>
    <table class="table table-border table-striped table-hover rounded w-75 m-auto mb-5 ">
        <tr>
            <th>Date</th>
            <th>Elève</th>
            <th>Note</th>
            <th>Commentaire</th>
            <th>Matière</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 0;
       foreach ($ContentNote as $note) {
           $i++;
           echo "<tr id='$i'><td>" . $note['DATE'] . "</td>";
           echo "<td>" . $note['Nom'] .' '. $note['Prenom'] . "</td>";
           echo "<td>" . $note['Note'] .'/20'. "</td>";
           echo "<td>" . $note['Contenu_note']."</td>";
           echo "<td>" . $note['Nom_Cours']."</td>";
           echo '<td class="flex">
                <i class="btn btn-default fa-solid fa-trash" onclick="deleteNote(' . $note['Id_note'] . ',' . $i . ')" style="color: #e40707;"></i>
            </td></tr>';
       }
        ?>
    </table>
<?php
    echo '<script src="../js/fonction.js"></script>';
}

function classe($id){
    include "BDD.php";
    $classe=$mysqli->query("SELECT cl.*,cle.*,u.Nom,u.Prenom,u.Mail FROM Classe cl, Classe_eleve cle, User u WHERE cl.Id_prof = $id AND cle.Id_classe=cl.Id_classe AND cle.Id_eleve=u.Id_user ");
?>
    <div class=" m-2 fs-4"><b>Mes classes</b></div>
    <table class="table table-border table-striped table-hover rounded w-75 m-auto mb-5 mt-5">
        <tr>
            <th>Classe n°</th>
            <th>Classe</th>
            <th>Elève</th>
            <th>Mail</th>
        </tr>
        <?php
        $i = 0;
        foreach ($classe as $eleve) {
            $i++;
            echo "<tr><td>" . $eleve['Id_classe'] . "</td>";
            echo "<td>" . $eleve['Nom_classe'] . "</td>";
            echo "<td>" . $eleve['Nom'] . '  '. $eleve['Prenom'] . "</td>";
            echo "<td>" . $eleve['Mail']."</td>";
        }
        ?>
    </table>
<?php
}




?>
<script>
    function swalSupportSend(content) {
        Swal.fire({
            title: '<i class="fa-solid fa-sheet-plastic"></i>Ajouter un support de cours',
            html: content,
            showCancelButton: true,
            confirmButtonText: 'Ajouter',
            cancelButtonText: 'Annuler',
            showCancelButton: true,
            reverseButtons: true,
            preConfirm: () => {
                const form = Swal.getPopup().querySelector('#uploadForm');
                const formData = new FormData(form);

                const fileInput = form.querySelector('#file_sup');
                if (!fileInput.files.length) {
                    Swal.showValidationMessage('Veuillez sélectionner un fichier');
                    return false; // Empêcher la fermeture du Swal en cas d'erreur de validation
                }

                return {
                    formData: formData
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = result.value.formData;

                fetch('addElement.php', {
                        method: 'POST',
                        body: formData
                    })
            }
        });
    }

    function deleteSup(Id_supdel, row) {

        swalConfirm();
        $('.swal2-confirm').on('click', function() {
            $.ajax({
                type: "GET",
                url: "addElement.php",
                dataType: 'json',
                data: {
                    deleteSupp: true,
                    Id_supdel: Id_supdel
                },
                success: function(response) {
                    setTimeout(function () {
                        $('#'+row).addClass('fadeOutElement');
                    }, 500);
                    setTimeout(function () {
                        $('#'+row).addClass('d-none');
                    }, 1100);

                }
            })
        })

    }

    function deleteNote(Id_supNote, row) {

        swalConfirm();
        $('.swal2-confirm').on('click', function() {
            $.ajax({
                type: "GET",
                url: "addElement.php",
                dataType: 'json',
                data: {
                    deleteNote: true,
                    Id_notedel: Id_supNote
                },
                success: function(response) {
                    setTimeout(function () {
                        $('#'+row).addClass('fadeOutElement');
                    }, 500);
                    setTimeout(function () {
                        $('#'+row).addClass('d-none');
                    }, 1100);

                }
            })
        })

    }



    function swalNoteSend(content) {
        Swal.fire({
            title: '<i class="fa-solid fa-sheet-plastic"></i>Ajouter une note',
            html: content,
            showCancelButton: true,
            confirmButtonText: 'Ajouter',
            cancelButtonText: 'Annuler',
            showCancelButton: true,
            reverseButtons: true,
            preConfirm: () => {
                const form = Swal.getPopup().querySelector('#formNote');
                const formData = new FormData(form);
                return {
                    formData: formData
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = result.value.formData;

                fetch('addElement.php', {
                        method: 'POST',
                        body: formData,
                        note:true
                    })
            }
        });
    }
</script>
<?php
footerASRI(true);
