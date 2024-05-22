<?php
include_once('../fonctionPHP/headerFooter.php'); 
headerASRI(true);

    function listeSupport($E_ID){
        include "BDD.php";
        $query = $mysqli -> query("SELECT Support.*, Cours.Nom_Cours FROM Support JOIN Cours ON Support.Id_cours = Cours.Id_cours WHERE Support.Id_user = $E_ID;");
        $supportList = $query->fetch_all(MYSQLI_ASSOC);
        ?>
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
                    echo '<td><i class="btn btn-action fa-regular fa-eye"></i></td></tr>';
                }


            ?>

            </table>


    <?php }

listeSupport(2);

?>