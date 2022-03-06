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
                <li><a id="listerquestions" href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerquestions&page=1"; ?>"><span>Listes Questions</span><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-liste.png" ; ?>" alt=""></a></li>
                <li><a id="ajouteradmin" href="<?php if ($_SESSION[USER_KEY]['login'] === "admin07@gmail.com") {echo WEBROOT."?controller=user&action=accueil&view=ajouteradmin";}else {echo "#";}  ?>"><span>Ajouter Admin</span><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-ajout.png" ; ?>" alt=""></a></li>
                <li><a id="listerjoueurs" href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerjoueurs&page=1"; ?>"><span>Listes Joueurs</span><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-liste.png" ; ?>" alt=""></a></li>
                <li><a id="ajouterquestions" href="<?php echo WEBROOT."?controller=user&action=accueil&view=ajouterquestions"; ?>"><span>Ajouter Questions</span><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-ajout.png" ; ?>" alt=""></a></li>
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
    <?php
        if (isset($_GET['action'])) {
            if (is_admin()) {
                echo $content_for_views;
            } else {?>
                <div class="droitejoueur"><div><button id="jouer">Jouer</button></div></div>
            <?php }  
        }?>
</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>