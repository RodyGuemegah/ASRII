<?php
include 'BDD.php';

// Requête SQL
$sql = "SELECT `Nom_fichier`,`Date` FROM `Emplois_du_temps` ORDER BY `Date` DESC;";

// Exécution de la requête et récupération des résultats
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Stockage des résultats dans une variable
    $emps = array();
    while ($row = $result->fetch_assoc()) {
        $emps[] = $row;
    }
} else {
    $emps = array();
}

// Fermeture de la connexion
$mysqli->close();
?>
<div class="table-wrap">
    <table class="tableSup">
        <thead class="thead-primary">
            <tr>
                <th class="colNom">Emplois du temps du mois de</th>
                <th class="colTel">Télécharger</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($emps as $emp):
                ?>
                <tr>
                    <th scope="row"><?php
                        $formatter = new IntlDateFormatter(
                            'fr_FR', 
                            IntlDateFormatter::NONE, 
                            IntlDateFormatter::NONE, 
                            null, 
                            null, 
                            'MMMM yyyy'
                        );
                        echo $formatter->format(strtotime($emp['Date']));
                    ?></th>
                    <td style="text-align: center;font-size: 0.5em;">
                        <div style="display: inline-block;">
                            <a href="../emploisDuTemps/<?php echo htmlspecialchars($emp['Nom_fichier']); ?>" download>
                                <button class="Btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" class="svgIcon">
                                        <path
                                            d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                                        </path>
                                    </svg>
                                    <span class="icon2"></span>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>