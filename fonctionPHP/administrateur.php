<?php
include_once('../fonctionPHP/headerFooter.php');
include "BDD.php";
headerASRI(true);
if (isset($_GET['id'])) $id = $_GET['id'];
 if (isset($_GET['page']) && $_GET['page'] != '') $page = $_GET['page'];
 else $page = 'user';
 if (isset($_GET['changeRight'])) $changeRight = $_GET['changeRight'];
 else $changeRight = false;
 if (isset($_GET['userID'])) $userID = $_GET['userID'];
 else $userID = '';
 if (isset($_GET['droitsChange'])) $droitsChange = $_GET['droitsChange'];
 else $droitsChange = '';

if($changeRight){
    $mysqli->query("UPDATE `User` SET `Privilege` = '$droitsChange' WHERE Id_user = '$userID'");
    exit();
}


//REDIRECTION SUR LES PAGES
 switch ($page) {
     case 'user':
         listeUtilisateur();
         break;
     default:
         listeUtilisateur();
 }

function listeUtilisateur()
{
    include "BDD.php";
    $utilisateurs = $mysqli->query("SELECT * FROM User");
    echo '<b class="fs-3 m-2">Liste des utilisateurs</b>';
    echo '<table class="table table-border table-striped table-hover rounded w-75 m-auto mb-5 mt-4">';
    echo '<tr>
            <th>
                Nom
            </th>
            <th>
                Prenom
            </th>
            <th>
                Mail
            </th>
            <th>
                Droit d\'accès
            </th>
            <th>
                Date d\'arriver
            </th>
            <th>
                Siret (si entreprise)
            </th>
          </tr>';
    foreach ($utilisateurs as $user) {
        if($user['Privilege'] == 0) $droits = "En attente d'un rôle";
        if($user['Privilege'] == 1) $droits = "Administrateur";
        if($user['Privilege'] == 2) $droits = "Entreprise";
        if($user['Privilege'] == 3) $droits = "Enseignant";
        if($user['Privilege'] == 4) $droits = "Elève";
        $droits="<select class='form-select' name='droits_".$user['Id_user']."' id='droits' onchange='changeRight(".$user['Id_user'].",this.value)'>
                <option selected>$droits</option>";
                if($user['Privilege'] != 0)$droits.="<option value='0'>En attente d'un rôle</option>";
                if($user['Privilege'] != 1)$droits.="<option value='1'>Administrateur</option>";
                if($user['Privilege'] != 2)$droits.="<option value='2'>Entreprise</option>";
                if($user['Privilege'] != 3)$droits.="<option value='3'>Enseignant</option>";
                if($user['Privilege'] != 4)$droits.="<option value='4'>Elève</option>";
                $droits.="</select>";

        echo '<tr>
            <td>
                '.$user["Nom"].'
            </td>
            <td>
                '.$user["Prenom"].'
            </td>
            <td>
                '.$user["Mail"].'
            </td>
            <td>
                '.$droits.'
            </td>
            <td>
                '.$user["Date_creation"].'
            </td>
            <td>
                '.$user["Siret"].'
            </td>
          </tr>';
    }
    echo '</table>';
}


footerASRI(true);

?>

<script>
function changeRight(user,value){
        console.log(value);
        if(value == 0) droits = "En attente d'un rôle";
        if(value == 1) droits = "Administrateur";
        if(value == 2) droits = "Entreprise";
        if(value == 3) droits = "Enseignant";
        if(value == 4) droits = "Elève";
        swalConfirm("Etes-vous sur de vouloir attribuer le rôle ''"+  droits +"'' à cet utilisateur?");
        $('.swal2-confirm').on('click', function() {
            alertSave("Changement de staut effectué");
            $.ajax({
                type: "GET",
                url: "administrateur.php",
                dataType: 'json',
                data: {
                    changeRight:true,
                    userID: user,
                    droitsChange: value
                },
                success: function(response) {
                }
            })
        })

}

</script>
