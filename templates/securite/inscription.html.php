<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");


    if (isset($_GET['true'])) {
        ?>
        <div class="inscriptionreussie"><span>Inscription Reussie!</span> <span id="exitreussite"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></span></div>
        <?php
    }
?>
<div class="bodyinscription">
    <div class="bodyinscription2">
    <div class="gaucheI">
        <div class="formtitleI">
            <h2>S'INSCRIRE</h2>
            <span>Pour tester votre niveau de culture générale</span>
        </div>
        <div class="formulaireI">
            <form action="<?php echo WEBROOT."" ; ?>" method="post">
                <small style="color: red;"><?php if(isset($_SESSION['errori']['loginpresent'])) {echo $_SESSION['errori']['loginpresent'];} ?></small>
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="inscription">

                <div class="sub"><label for="subprenom">Prenom</label><input type="text" name="subprenom" id="subprenom" placeholder="Prenom" value=""><small style="color: red;"></small></div>
                <div class="sub"><label for="subnom">Nom</label><input type="text" name="subnom" id="subnom" placeholder="Nom" value=""><small style="color: red;"></small></div>
                <div class="sub"><label for="sublogin">Login</label><input type="text" name="sublogin" id="sublogin" placeholder="Login" value=""><small style="color: red;"></small></div>
                <div class="sub"><label for="subpassword">Password</label><input type="password" name="subpassword" id="subpassword" placeholder="Password" value=""><small style="color: red;"></small></div>
                <div class="sub"><label for="subpassword2">Confirmer Password</label><input type="password" name="subpassword2" id="subpassword2" placeholder="Confirmer Password" value=""><small style="color: red;"></small></div>

                <div id="chargerimg"><div><span>Avatar</span></div><div><button>Choisir un fichier</button></div></div>
                <input type="submit" id="subbtn" name="subbtn" value="Creer un Compte">
            </form>
            <span id="connexion"><a href="<?php echo WEBROOT."?controller=securite&action=connexion";?>">Se Connexion ?</a></span>
        </div>
        
    </div>
    <div class="droiteI">
        <img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."player.png" ; ?>" alt="">
        <h2>Avatar du joueur</h2>
    </div>
    </div>
    <div class="escalier"></div>
    <div class="escalier"></div>
    <div class="escalier"></div>
    <div class="escalier"></div>
</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
if (isset($_SESSION['errori'])) {
    unset($_SESSION['errori']);
}
?>