<?php session_start();
if(isset($_GET['login']))$login=$_GET['login'];
else $login='inscription';

if(isset($_POST['deconnexion']))$deconnexion=$_POST['deconnexion'];
else $deconnexion=false;

//Permet d'obtenir l'id du client ce qui permet de faire toutes les requetes 
function GetU_ID()
{   

    include "BDD.php";
    if(isset($_COOKIE["token"])){
        $token = $_COOKIE["token"];
        $indexsql = $mysqli->query("SELECT Id_user FROM User WHERE Token = '$token'");
        $index = $indexsql->fetch_assoc(); 
        $U_ID = $index['Id_user']; 
        return $U_ID;
    }else return 0;
    
}

function Get_droits($id)
{   

    include "BDD.php";
    if(isset($_COOKIE["token"])){
        $token = $_COOKIE["token"];
        $privilegesql = $mysqli->query("SELECT Privilege FROM User WHERE Id_user =$id");
        $privilege = $privilegesql->fetch_assoc(); 
        $privilege = $privilege['Privilege']; 
        return $privilege;
    }else return 0;
    
}

//Permet de savoir si l'utilisateur est un administrateur ou non
function IsAdmin($index)
{
    
    include "BDD.php";
    $token = $_COOKIE["Mail"];
    $IsAdmin = $objet->RequeteSQlTreatment("SELECT ADMINN FROM user WHERE ADMINN = '1' AND Mail='$token' AND U_ID='$index'", true);
    if(isset($IsAdmin[0][0])) return ($IsAdmin[0][0] == 1) ;
    
}



function CreationCompte()
//Fonction Qui permet la création d'un compte en sécurisant le mode de passe 
{   
    
    include "BDD.php";
    if (isset($_POST['mail'])) {
        $mail = $_POST['mail'];
        $result = $mysqli -> query("SELECT Mail FROM User WHERE Mail='$mail'");
        $nbOccurance= mysqli_num_rows($result);
         if ($nbOccurance == 0) {
             $mdpHash = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);
             $queryInsert = $mysqli->query("INSERT INTO User (Mail, Nom, Prenom, Mot_de_passe, Privilege, Siret, Date_creation) VALUES ('" . $_POST['mail'] . "', '" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $mdpHash . "', '" . '0' . "', '" . $_POST['siret'] . "', NOW())");
             header("Location: ../PageHtml/Connexion.html.php?inscrit=1");
             exit;
         }
    }
}

function Connexion()
//Fonction Qui permet de se connecter à son compte via un email et un mdp
{
    
    include "BDD.php";
    if (isset($_POST['mail'])) {
        $mailConnexion = $_POST['mail'];
        $MdpConnexion = $_POST['mdp1'];
        $queryConnexion = $mysqli->query("SELECT Mail, Mot_de_passe FROM User WHERE Mail = '$mailConnexion'"); 
        $result = $queryConnexion->fetch_all(MYSQLI_ASSOC);
            if ($queryConnexion) {
                if (password_verify($MdpConnexion, $result[0]["Mot_de_passe"])) {
                    $token = bin2hex(random_bytes(32));
                    $mysqli->query("UPDATE `User` SET `Token` = '$token' WHERE Mail = '$mailConnexion'");
                    setcookie("token", $token, time() + 3600, "/");
                    setcookie("Mail", $mailConnexion, time() + 3600, "/");
                    echo " le mdp est bon connexion reussi  ";
                    header("location: ../index.php");
                    exit();
                } else {
                    echo "le mdp n'est pas bon connexion RATEEEE !!!!!! ";
                };
            } else {
                echo "l'identifiant n'est pas bon";
            };
        }
}



function Veriflogin($redirect=false)
//Fonction qui permet de verifier si un utilisateur est connecter
{
    include "BDD.php";
    if(isset($_COOKIE["token"])){
        $mail = $_COOKIE["Mail"];
        $token = $_COOKIE["token"];
        if ($token) {
            $rep = $mysqli->query("SELECT Mail,Token FROM User WHERE Mail='$mail' AND Token='$token'");
            return 1; // connecter
        } 
    }
    else{ 
       if($redirect)header("Location: ../PageHtml/Connexion.html.php");
        return 0; //Non connecter
    }
}


function Deconnexion()
//Fonction Qui permet de se déconnecter de son compte
{
    
    include "BDD.php";
    $mail = $_COOKIE["Mail"];
    $rep = $mysqli->query("UPDATE `User` SET `Token` = '' WHERE Mail='$mail'");
    setcookie("Mail", "", time() - 1, "/");
    setcookie("token", "", time() - 1, "/");
    json_encode(array("redirect" => true));
    header("Location: ../index.php");
    exit();

}



if($login == 'inscription'){
    CreationCompte();
}

if($login == 'connexion'){
    Connexion();
}


if ($deconnexion == true) {
    Deconnexion();
}
