<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."menu.html.php");
?>

<div class="main">
    <div class="gauche">
        <div class="head">
            <img src="<?php 
            if (is_admin()) {
                echo WEBROOT."img".DIRECTORY_SEPARATOR."avataradmin.png" ; 
            } else {
                echo WEBROOT."img".DIRECTORY_SEPARATOR."player.png" ; 
            }
            ?>" alt="">
            <span><?php echo $_SESSION[USER_KEY]['prenom']." ".$_SESSION[USER_KEY]['nom']  ;?></span>
            <span style="font-weight: bold;"><?php echo $_SESSION[USER_KEY]['role'] ?></span>
        </div>
        <div class="choice" <?php /* if (!is_admin()) {?> style="backgroun-color: #17B169;color: white;" <?php } */?>>
            <?php
                if (is_admin()) {
            ?>
            <ul>
                <li id="listerjoueurs">Listes Joueurs</li>
                <li id="listerquestions">Listes Questions</li>
                <li id="ajouterquestions">Ajouter Questions</li>
                <li id="ajouteradmin">Ajouter Admin</li>
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
            }
            ?>
        </div>
    </div>
    <?php if (is_admin()) {?>
        <div class="droite">
            <div class="default"><h1>Bienvenue Admin</h1></div>
            <div class="listejoueurs">
                <h1>Tableaux des joueurs</h1>
                <table>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Score</th>
                    </tr>
                    <?php 
                        $array = find_data("users");
                        foreach ($array as$value) {
                            echo "<tr>";
                            echo "<td>".$value['prenom']."</td>";
                            echo "<td>".$value['nom']."</td>";
                            echo "<td>".$value['score']."</td>";
                            echo "</tr>";
                        }

                    ?>

                </table>
            </div>
        </div>
    <?php } else {?>
        <div class="droitejoueur"><div><button id="jouer">Jouer</button></div></div>
    <?php } ?>
</div>

<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>