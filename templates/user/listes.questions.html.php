<?php
    $nbre_elements = 0;
    $data= find_data();
    $array = $data["questions"];
    foreach ($array as $value) {
        $nbre_elements ++;
    }
    $page =1;
    $errorsnbrelement = "";
    if (isset($_GET['nbrelement'])) {
        if (empty($_GET['nbrelement'])) {
            $errorsnbrelement = "Champ vide";
        } elseif (!is_numeric($_GET['nbrelement'])) {
            $errorsnbrelement = "Entrer un nombre plz";
        } elseif ($_GET['nbrelement'] < 1 || $_GET['nbrelement'] > 5) {
            $errorsnbrelement = "Entrer un nombre entre 1 et 5";
        } else {
            $_SESSION['nbrelement'] = $_GET['nbrelement'];
            $elements_par_pages = $_SESSION['nbrelement'];
        }
    }
    if (isset($elements_par_pages)) {
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
    } else {
        $premierElement=0;
        $dernierElement=0;
    }

    

?>
<div class="droite dlistesQuestions">
    <?php 
    if ($nbre_elements == 0) {
        echo "Pas de Question disponible";
    } else {
        /* if (isset($page) && $page == 1) { */
    ?>
    <form action="<?php echo WEBROOT."?controller=user&action=accueil&view=listerquestions&page=1"; ?>" method="get">
        <input type="hidden" name="controller" value="user">
        <input type="hidden" name="action" value="accueil">
        <input type="hidden" name="view" value="listerquestions">
        <input type="hidden" name="page" value="<?php echo $page ; ?>">
        <label for="nbrelement">Nbre Questions/jeu :</label><input type="text" name="nbrelement" id="nbrelement" value="<?php  if (isset($_SESSION['nbrelement'])) { echo $_SESSION['nbrelement']; } ;?>">
        <input type="submit" value="ok">
        <small style="color: red;"><?php if (isset($errorsnbrelement)) {echo $errorsnbrelement;} ?></small>
    </form>
    <?php  /*  } else {
        echo "<h3>Liste des questions</h3>"; */
    } ?>
    <div class="liste">
        <?php
            echo "<ol>";
            for ($i=$premierElement; $i < $dernierElement; $i++) { 
                if ($i < $nbre_elements) {
                    echo "<li>".$array[$i]['question']."</li>"."\n";
                    echo "<ul>";
                    foreach ($array[$i]['reponses'] as $key => $value) {
                        echo "<li>".$value."</li>";
                    }
                    echo "</ul>";
                } 
            }
            echo "</ol>";
            
        ?>
        
    </div>
    <div class="suivant listequestion">
        <span id="suivantliste" style="<?php if($page == 1) {echo "visibility:hidden;";} ?>"><a href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerquestions&page=".($page-1)."&nbrelement=".$elements_par_pages ; ?>">Precedent</a></span>
        <span id="suivantliste" style="<?php if($page == $nbre_pages) {echo "visibility:hidden;";} ?>"><a href="<?php echo WEBROOT."?controller=user&action=accueil&view=listerquestions&page=".($page +1)."&nbrelement=".$elements_par_pages; ?>">Suivant</a></span>
    </div>
    <?php 
    if (isset($errorsnbrelement)) {
        unset($errorsnbrelement);
    }
    ?>
</div>
