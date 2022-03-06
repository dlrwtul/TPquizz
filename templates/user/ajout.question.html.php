<div class="droite dajoutquestion">
    <div class="formtitleQ">
        <h1>PARAMETRER VOTRE QUESTION</h1>
    </div>
    <div class="formulaireQ">
        <form action="<?php WEBROOT ?>" method="post">
            <small style="color: red;"><?php if(isset($_SESSION['errorq']['globalerror'])) {echo $_SESSION['errorq']['globalerror'];} ?></small>
            <small style="color: red;"><?php if(isset($_SESSION['errorq']['questionpresente'])) {echo $_SESSION['errorq']['questionpresente'];} ?></small>
            <small style="color: green;"><?php if(isset($_GET['true'])) {echo "Ajout de Question Reussie";} ?></small>
            <input type="hidden" name="controller" value="user">
            <input type="hidden" name="action" value="question">
            <div class="quest"><label for="questions">Questions</label><input type="text" id="questions" name="questions" value=""></div>
            <small style="color: red;margin-left:12%" id="errorquestion"></small>
            <div class="quest"><label for="nbrpts">Nbre de Points</label><input type="number" name="nbrpts" id="nbrpts"></div>
            <small style="color: red;margin-left:15%" id="errornbrpts"></small>
            <div class="quest">
                <label for="typerep">Type de réponse</label>
                <select name="typerep" id="typerep">
                    <option value="default">Donner le type de reponse</option>
                    <option value="radio">radio</option>
                    <option value="checkbox">checkbox</option>
                    <option value="text">text</option>
                </select>
                <span id="btntyperep">+</span>
            </div>
            <div id="quest" class="quest">
                <!-- <div class="lesreponses"><label for="lesreponses">Reponse1</label><input type="text" id="lesreponses" name="lesreponses"><input type="checkbox" name="" id=""><input type="radio" name="" id=""><span><img class="supic" src="<?php /* echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-supprimer.png"; */ ?>" alt=""></span></div> -->
            </div>
            <input type="submit" id="questbtn" name="questbtn" value="Enregistrer">
        </form>
    </div>
        
</div>

<?php 
if (isset($_SESSION['errorq'])) {
    unset($_SESSION['errorq']);
}

?>