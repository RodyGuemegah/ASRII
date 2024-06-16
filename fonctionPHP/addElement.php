<?php
include "BDD.php";
//SUPPORT
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

//Suppression
if(isset($_GET['deleteSupp']))$deleteSupp=$_GET['deleteSupp'];
else $deleteSupp=false;

if(isset($_GET['Id_supdelp']))$Id_supdelp=$_GET['Id_supdelp'];
else $Id_supdelp=false;

if(isset($_POST['action']))$action=$_POST['action'];
else $action=false;


if(isset($_GET['deleteNote']))$deleteNote=$_GET['deleteNote'];
else $deleteNote=false;

if(isset($_GET['Id_notedel']))$Id_notedel=$_GET['Id_notedel'];
else $Id_notedel=false;



//NOTE
if(isset($_POST['note']))$note=$_POST['note'];
else $note='';
if(isset($_POST['profId']))$profId=$_POST['profId'];
else $profId='';
if(isset($_POST['eleve']))$eleve=$_POST['eleve'];
else $eleve='';
if(isset($_POST['matiere']))$matiere=$_POST['matiere'];
else $matiere='';
if(isset($_POST['Contenu_note']))$Contenu_note=$_POST['Contenu_note'];
else $Contenu_note='';



if($action == 'support'){
 if ($file['error'] === UPLOAD_ERR_OK) {
     $fileName = trim($nom);
     $fileTmpPath = $file['tmp_name'];
     $uploadDir = '../pdf/supportCours/';
     $filePath = $uploadDir . trim($fileName).'.pdf';
    $query = $mysqli->query("INSERT INTO Support (Nom_sup, Nom_fichier, Date_ajout, Id_user,Id_cours) VALUES ('$nom','$filePath',NOW(),$E_ID,2)");
     if (move_uploaded_file($fileTmpPath, $filePath)) {
        header("Refresh:0");
     }
 }
}

if($action == 'note'){
    $query = $mysqli->query("INSERT INTO Notes (Id_user, Id_cours, Contenu_note,Note,DATE) VALUES ($eleve,$matiere,'$Contenu_note',$note,NOW())");
    header("Refresh:0");

}

if($deleteSupp){

    $delete = $mysqli->query("DELETE FROM Support WHERE Id_sup=$Id_supdelp;");
    header("Refresh:0");

}

if($deleteNote){

    $delete = $mysqli->query("DELETE FROM Notes WHERE Id_note=$Id_notedel;");
    header("Refresh:0");

}