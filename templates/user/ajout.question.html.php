<div class="droite dajoutquestion">
    <div class="formtitleQ">
        <h1>PARAMETRER VOTRE QUESTION</h1>
    </div>
    <div class="formulaireQ">
        <form action="<?php WEBROOT ?>" method="post">
            <input type="hidden" name="controller" value="user">
            <input type="hidden" name="action" value="question">
            <div class="quest"><label for="questions">Questions</label><input type="text" id="questions" name="questions" value=""></div>
            <div class="quest"><label for="nbrpts">Nbre de Points</label><input type="number" name="nbrpts" id="nbrpts"></div>
            <div class="quest">
                <label for="typerep">Type de réponse</label>
                <select name="typerep" id="typerep">
                    <option value="default">Donner le type de reponse</option>
                    <option value="radio">radio</option>
                    <option value="checkbox">checkbox</option>
                    <option value="text">text</option>
                </select>
                <button id="btntyperep">+</button>
            </div>
            <div class="quest">
                <div class="lesreponses"><label for="lesreponses">Reponse1</label><input type="text" id="lesreponses" name="lesreponses"><input type="checkbox" name="" id=""><input type="radio" name="" id=""><span><img id="supic" src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-supprimer.png"; ?>" alt=""></span></div>
            </div>
            <input type="submit" id="questbtn" name="questbtn" value="Enregistrer">
        </form>
    </div>
        
</div>