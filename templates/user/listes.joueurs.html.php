<?php
    $nbre_elements = 0;
    $data= find_data();
    $array = $data["users"];
    foreach ($array as $value) {
        if ($value['role'] == "JOUEUR") {
            $nbre_elements ++;
        }
    }
    if ($nbre_elements >= 15) {
        $elements_par_pages = 15;
    } else {
        $elements_par_pages = $nbre_elements;
    }
    
    $nbre_pages = ceil($nbre_elements/$elements_par_pages);
    if ($_GET['page'] <= $nbre_pages) {
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    
    if ($page != 1) {
        $premierElement = ($page-1)*$elements_par_pages ;
    } else {
        $premierElement = 0;
    }
    
    $dernierElement = $page*$elements_par_pages;
    
?>
<div class="droite dlistesJoueurs">
    <?php 
    if ($nbre_elements == 0) {
        echo "Pas de Joueur inscrit";
    } else {
    ?>
    <h1>Tableaux des joueurs</h1>
    <div class="tableau">
        <table>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Score</th>
            </tr>
            <?php
            for ($i=$premierElement; $i < $dernierElement; $i++) { 
                if ($array[$i]['role'] == "JOUEUR") {
                    echo "<tr>";
                    echo "<td>" . $array[$i]['prenom'] . "</td>";
                    echo "<td>" . $array[$i]['nom'] . "</td>";
                    echo "<td>" . $array[$i]['score'] . " pts" . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <div class="suivant">
        <span id="suivantliste" style="<?php if($page == 1) {echo "visibility:hidden;";} ?>"><a href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerjoueurs&page=".$page-1; ?>">Precedent</a></span>
        <span id="suivantliste" style="<?php if($page == $nbre_pages) {echo "visibility:hidden;";} ?>"><a href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerjoueurs&page=".$page +1; ?>">Suivant</a></span>
    </div>
    <?php } ?>
</div>
