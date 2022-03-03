<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");

?>

<div class="main">
    <div class="menu">
        <div class="menutitle"><h1>CREER ET PARAMETRER VOS QUIZZ</h1></div>
        <div class="deconnexion"><a href="<?php echo WEBROOT."?controller=securite&action=deconnexion";?>">Deconnexion</a></div>
    </div>
    <div class="affichage">
    <div class="gauche">
        <div class="head">
            <img src="<?php 
            if (isset($_GET['action'])) {
                if (is_admin()) {
                    echo WEBROOT."img".DIRECTORY_SEPARATOR."avataradmin.png" ; 
                } else {
                    echo WEBROOT."img".DIRECTORY_SEPARATOR."player.png" ; 
                }
            }
            ?>" alt="">
            <span style="margin-left: 2%;"><?php echo $_SESSION[USER_KEY]['prenom']." ".$_SESSION[USER_KEY]['nom']  ;?></span>
            <span id="role" style="font-weight: bold;margin-left: 2%;"><?php echo $_SESSION[USER_KEY]['role'] ?></span>
        </div>
        <div class="choice">
            <?php
                if (isset($_GET['action'])) {
                    if (is_admin()) {
            ?>
            <ul>
                <div id="listerquestions"><li>Listes Questions</li><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-liste.png" ; ?>" alt=""></div>
                <div id="ajouteradmin"><li>Ajouter Admin</li><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-ajout.png" ; ?>" alt=""></div>
                <div id="listerjoueurs"><li>Listes Joueurs </li><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-liste.png" ; ?>" alt=""></div>
                <div id="ajouterquestions"><li>Ajouter Questions</li><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-ajout.png" ; ?>" alt=""></div>
            </ul>
            <?php
            } else {
                $array = find_data("users");
                $rang = 1;
                foreach ($array as $value) {
                    if ($_SESSION[USER_KEY]['score'] < $value['score']) {
                        $rang++;
                    }
                }
            ?>

            <div id="scorejoueur"><?php echo "Score : ".$_SESSION[USER_KEY]['score'] ; ?></div>
            <div id="rangjoueur"><?php echo "Votre rang au classement est : ".$rang ; ?></div>

            <?php
            }}
            ?>
        </div>
    </div>
<!--     <?php
            if (isset($_GET['action'])) {
                if (is_admin()) {
            ?>
 -->    <div class="droite">
            <div class="default"><h1>Bienvenue Admin</h1></div>
            <div class="listejoueurs">
                <?php require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."listes.joueurs.html.php") ?>
            </div>
            <div class="newadmin">
                <?php 
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."ajout.admin.html.php") 
                ?>
            </div>
            <div class="listequestions">
                listequestions
            </div>
            <div class="newquestion">
                newquestion
            </div>
        </div>
<!--     <?php } else {?>
 -->        <div class="droitejoueur"><div><button id="jouer">Jouer</button></div></div>
<!--     <?php }   }?>
 -->    </div>
</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
/* if (isset($_GET['true'])) {
    unset($_GET['true']);
} */
?>