<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>

<div class="container">
    <div class="body">
        <div class="formtitle">Connexion</div>
        <div class="formulaire">
            <form action="<?php WEBROOT ?>" method="post">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="connexion">

                <div class="login"><label for="login">Login</label><input type="text" id="login" name="login" placeholder="email" value="">
                <!-- <i style="color: green;bottom:30px;" class="bi bi-check-circle-fill login"></i>
                <i style="color: red;bottom:53px;" class="bi bi-exclamation-circle-fill login"></i></div> -->
                <small id="errorlogin">message error</small>
                <div class="password"><label for="password">Password</label><input type="password" id="password" name="password" placeholder="mot de passe" value="">
                <!-- <i style="color: green;bottom:30px;" class="bi bi-check-circle-fill password"></i>
                <i style="color: red;bottom:53px;" class="bi bi-exclamation-circle-fill password"></i></div> -->
                <small id="errorpassword">message error</small>
                <small id="lasterror">
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo $_SESSION['error']['unauthentified'];
                        }
                    ?>
                </small>
                
                <input type="submit" id="btn" name="btn" value="Connexion">
            </form>
        </div>
    </div>
    <small id="inscription"><a href="<?php echo WEBROOT."?controller=securite&action=inscription";?>">S'inscrire ?</a></small>
</div>

<?php
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']); 
}
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>