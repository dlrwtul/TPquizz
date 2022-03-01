<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>

<div class="subcontainer">
    <?php 
        if (isset($_GET['true'])) {
            ?>
            <div class="inscriptionreussie"><span>Inscription Reussie!</span> <span id="exitreussite"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16"><path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg></span></div>
            <?php
        }
    ?>
    <div class="subbody">
        <div class="subformtitle">Inscription</div>
        <div class="subformulaire">
            <div>
            <form action="<?php WEBROOT ?>" method="post">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="inscription">

                <div class="sub"><label for="subprenom">Prenom</label><input type="text" name="subprenom" id="subprenom" placeholder="Prenom" value=""></div>
                <div class="sub"><label for="subnom">Nom</label><input type="text" name="subnom" id="subnom" placeholder="Nom" value=""></div>
                <div class="sub"><label for="sublogin">Login</label><input type="text" name="sublogin" id="sublogin" placeholder="Login" value=""></div>
                <div class="sub"><label for="subpassword">Password</label><input type="password" name="subpassword" id="subpassword" placeholder="Password" value=""></div>
                <div class="sub"><label for="subpassword2">Confirmer Password</label><input type="password" name="subpassword2" id="subpassword2" placeholder="Confirmer Password" value=""></div>

                <!--<div id="chargerimg"><div><span>Avatar</span></div><div><input type="file" name="imgavatar" id="imgavatar"></div></div>-->
                <input type="submit" id="subbtn" name="subbtn" value="Creer un Compte">

            </form>
            <small id="connexion"><a href="<?php echo WEBROOT."?controller=securite&action=connexion";?>">Se Connexion ?</a></small>
            </div>
        </div>
    </div>
</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>