<?php
include_once('../fonctionPHP/headerFooter.php'); 
headerASRI(true);
if(isset($_GET['inscrit'])) $inscrit=$_GET['inscrit'];
else $inscrit=0;
?>
<section class="p-0 m-0 w-100 d-flex mt-3 mb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-11 rounded rounded-xl card d-flex flex-row align-items-center p-1" style="height:75%">
                <div class="col-5 border-end connexionbg">
                </div>
                <div class="col-7 border-start">
                    <!-- SI NON INSCRIT -->
                <?php if($inscrit == 0){ ?>
                    <h2 class="justify-content-center w-100 d-flex mt-2">S'inscrire</h2>
                    <form class="p-2" action="../FonctionPHP/identification.php?login=inscription" method="POST" enctype="multipart/form-data">
                        <label for="mail" class="form-label mt-2">Adresse Mail</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="ex:client@gmail.com"  required>

                        <label for="nom" class="form-label mt-4">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="ex:gabr" required>

                        <label for="prenom" class="form-label mt-4">prenom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="ex:gabr" required>

                        <label for="mdp1" class="form-label mt-4">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp1" name="mdp1" placeholder="8 carct min"  required>

                        <label for="mdp2" class="form-label mt-4">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="mdp2" name="mdp2" placeholder="8 carct min"  required>
                        
                        <input class="d-none" value="1" name="privilege" type="text">
                    <!-- DIV NUMERO DE SIRET QUI APPARAIT UNIQUEMENT QUAND ENTREPRISE EST SELECTIONE  -->
                        <div class="" id="siretDiv">
                            <label for="siret" class="form-label mt-4">Numéro de siret - facultatif</label>
                            <input type="number" class="form-control" id="siret" name="siret" placeholder="ex:numéro de siret" >
                        </div>

                        <label for="showMdp" class="form-label mt-4">Afficher le mot de passe</label>
                        <input onclick="showMdp1(this.checked)" type="checkbox" id="showMdp" name="showMdp" class="form-check-input mt-4">
                        <br>
                        <div class="text-end">
                            <a class="float-start" href="../PageHtml/Connexion.html.php?inscrit=1"><span>Déjà inscrit?</span></a> 
                            <input type="submit" class="btn btn-primary float-right " value="S'inscrire"> 
                        </div>
                    </form>
                <?php }else if($inscrit == 1){ ?>
                    <!-- SI INSCRIT -->
    
                    <h2 class="justify-content-center w-100 d-flex mt-2">Se connecter</h2>
                    <form class="p-2" action="../FonctionPHP/identification.php?login=connexion" method="POST" enctype="multipart/form-data">
                        <label for="mail" class="form-label mt-2">Adresse Mail</label>
                        <input type="email" class="form-control" id="mail" name="mail" placeholder="ex:client@gmail.com"  required>

                        <label for="mdp1" class="form-label mt-4">Mot de passe</label>
                        <input type="password" class="form-control" id="mdp1" name="mdp1"  placeholder="8 carct min" required>

                        <label for="showMdp" class="form-label mt-4">Afficher le mot de passe</label>
                        <input onclick="showMdp1(this.checked)" type="checkbox" id="showMdp" name="showMdp" class="form-check-input mt-4">
                        <br>
                        <div class="text-end">
                            <a class="float-start" href="../PageHtml/Connexion.html.php?inscrit=0"><span>Pas encore inscrit?</span></a> 
                            <input type="submit" class="btn btn-primary float-right " value="Se connecter"> 
                        </div>
                    </form>
                <?php }?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    footerASRI(true);
?>

<script>
function showMdp1(value){
    if(value == true){
        $('#mdp1').attr('type', 'text');
        $('#mdp2').attr('type', 'text');
    }
    else{
        $('#mdp1').attr('type', 'password');
        $('#mdp2').attr('type', 'password');
    }

}
</script>