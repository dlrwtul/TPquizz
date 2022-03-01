<link rel="stylesheet" href="/TPQUIZZ/public/css/menu.css">
<div class="menu">
    <div>
        <ul>
            <div id="autre">
            <li style="color: white;font-weight:bold;font-size: 2em;margin-right:5em;padding-left: 20px;">QUIZZ App</li>
                <li><a href="#">Dashboard</a></li>
                <?php 
                    if (is_admin()) {
                    ?>  <li><a href="#">Liste des Joueurs</a></li>
            <?php } else {?>
                        <li><a href="#">Joueur</a></li>
                <?php }?>
            </div>
            <div id="deconnexion">
                <li><a href="<?php echo WEBROOT."?controller=securite&action=deconnexion";?>">Deconnexion</a></li>
            </div>

        </ul>
    </div>
</div>