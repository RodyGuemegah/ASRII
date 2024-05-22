<?php
include "BDD.php";
if(isset($_POST['matiere']))$matiere=$_POST['matiere'];
else $matiere='';
if(isset($_POST['nom']))$nom=$_POST['nom'];
else $nom='';
if(isset($_POST['E_ID']))$E_ID=$_POST['E_ID'];
else $E_ID='';

if(isset($_POST['Id_sup']))$Id_sup=$_POST['Id_sup'];
else $Id_sup='';
if(isset($_FILES['file_sup']))$file=$_FILES['file_sup'];
else $file='';

if(isset($_POST['delete']))$delete=$_POST['delete'];
else $delete=false;

 if ($file['error'] === UPLOAD_ERR_OK) {
     $fileName = trim($nom);
     $fileTmpPath = $file['tmp_name'];
     $uploadDir = '../pdf/supportCours/';
     $filePath = $uploadDir . trim($fileName).'.pdf';
    $query = $mysqli->query("INSERT INTO Support (Nom_sup, Nom_fichier, Date_ajout, Id_user,Id_cours) VALUES ('$nom','$filePath',NOW(),$E_ID,2)");
     if (move_uploaded_file($fileTmpPath, $filePath)) {
        header("Location: enseignant.php");
     }
 }

if($delete){

    $delete = $mysqli->query("DELETE FROM Support WHERE Id_sup=$Id_sup;");
    header("Location: enseignant.php");

}