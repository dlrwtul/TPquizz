<?php
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
$loginr = "";
$inputbc = "rgb(81,191,208)";
if (isset($_SESSION['error']['login'])) {
    $loginr = $_SESSION['post']['login'];
    $inputbc = "red";
}
?>

<div class="body">
        <div class="formtitle"><span>Login Form</span><span>+</span></div>
        <div class="formulaire">
            <form action="<?php WEBROOT ?>" method="post">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="connexion">
                <div class="login"><input type="text" style="border-color: <?php echo $inputbc; ?>;" id="login" name="login" placeholder="Login" value="<?php $loginr ?>"><img src="<?php echo WEBROOT."img".DIRECTORY_SEPARATOR."ic-login.png"; ?>" alt=""></div>
                <small id="errorlogin">message error</small>
                <div class="password"><input type="password" style="border-color: <?php echo $inputbc; ?>;" id="password" name="password" placeholder="Password" value=""><img src="" alt=""></div>
                <small id="errorpassword">message error</small>
                <small id="lasterror">
                    <?php if (isset($_SESSION['error']['unauthentified'])) {echo $_SESSION['error']['unauthentified'];}?>
                </small>
                
                <div class="last">
                    <input type="submit" id="btn" name="btn" value="Connexion">
                    <small id="inscription"><a href="<?php echo WEBROOT."?controller=securite&action=inscription";?>">S'inscrire pour jouer?</a></small>
                </div>
            </form>
        </div>
    </div>
<?php
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']); 
}
require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>