<div class="droite">
    <div id="bodyinscription" class="bodyinscription">
        <div class="bodyinscription2">
        <div class="gaucheI">
            <div class="formtitleI">
                <h2>S'INSCRIRE</h2>
                <span>Pour proposer des quizz</span>
            </div>
            <div class="formulaireI">
                <form action="<?php WEBROOT ?>" method="post">
                    <small style="color: red;"><?php if(isset($_SESSION['errori']['loginpresent'])) {echo $_SESSION['errori']['loginpresent'];} ?></small>
                    <small style="color: green;"><?php if(isset($_GET['true'])) {echo "Inscription Reussie";} ?></small>
                    <input type="hidden" name="controller" value="user">
                    <input type="hidden" name="action" value="inscription">

                    <div class="sub"><label for="subprenom">Prenom</label><input type="text" name="admprenom" id="subprenom" placeholder="Prenom" value=""><small style="color: red;"></small></div>
                    <div class="sub"><label for="subnom">Nom</label><input type="text" name="admnom" id="subnom" placeholder="Nom" value=""><small style="color: red;"></small></div>
                    <div class="sub"><label for="sublogin">Login</label><input type="text" name="admlogin" id="sublogin" placeholder="Login" value=""><small style="color: red;"></small></div>
                    <div class="sub"><label for="subpassword">Password</label><input type="password" name="admpassword" id="subpassword" placeholder="Password" value=""><small style="color: red;"></small></div>
                    <div class="sub"><label for="subpassword2">Confirmer Password</label><input type="password" name="admpassword2" id="subpassword2" placeholder="Confirmer Password" value=""><small style="color: red;"></small></div>

                    <div id="chargerimg"><div><span>Avatar</span></div><div><button>Choisir un fichier</button></div></div>
                    <input type="submit" id="subbtn" name="admbtn" value="Ajouter un admin">
                </form>
            </div>
            
        </div>
        <div class="droiteI">
            <img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."avataradmin.png" ; ?>" alt="">
            <h2>Avatar admin</h2>
        </div>
        </div>
    </div>
    <div class="escalier1"></div>
    <div class="escalier1"></div>
    <div class="escalier1"></div>
</div>