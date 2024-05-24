<?php
include_once ('../fonctionPHP/headerFooter.php');
headerASRI(true);
?>

<div class="card">
    <div class="card-body">
        <div class="card-header col-md bg-dark h4">
            Vous Souhaitez recruter un alternant ?
        </div>
        <form action="/action_page.php" style="border:1px solid #ccc">
            <div class="container">
                <h1>Société</h1>

                <label for="email"><b>Nom entreprise</b></label>
                <input type="text" placeholder="Entrer votre mail" name="email" required>

                <label for="sites"><b>Sites web</b></label>
                <input type="text" placeholder="Enter votre sites web" name="sites" required>

                <label for="siret"><b>SIRET *</b></label>
                <input type="text" placeholder="Entrer votre n°SIRET" name="siret" required>
                <hr>

                <h1>Contact et emploie</h1>

                <label for="Name"><b>Nom</b></label>
                <input type="text" placeholder=" name" name="name" required>

                <label for="Prenom"><b>Prenom</b></label>
                <input type="text" placeholder=" prenom" name="prenom" required>

                <label for="city"><i class="fa fa-institution"></i><b>Ville</b></label>
                <select id="country" name="country"></select>
                <input type="text" id="city" name="city" placeholder="Essonne">

                <label for="int"><b>Intitule du poste</b></label>
                <input type="text" placeholder=" Intitule" name="int" required>

                <div class="form-group col-lg-12">
                <label for="int"><b>Descriptif du poste</b></label>
                    <textarea class="form-control" id="form-group-input" name="notes" rows="6" placeholder="Décrivez en quelques mots le poste que vous souhaitez proposé"></textarea>
                </div>
                
                
                <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.
                </p>

                <div class="clearfix">
                    <button type="button bg-danger" class="cancelbtn">Annuler</button>
                    <button type="submit" class="signupbtn">Postez votre annonce</button>
                </div>
            </div>
        </form>
    </div>
</div>



<?php
footerASRI(true);
?>