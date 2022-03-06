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
        <div class="formtitle"><span>Login Form</span></div>
        <div class="formulaire">
            <form action="<?php WEBROOT ?>" method="post">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="connexion">
                <div class="login"><input type="text" style="border-color: <?php echo $inputbc; ?>;" id="login" name="login" placeholder="Login" value="<?php $loginr ?>"><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16"><path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/><path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1H1Zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1V2Z"/></svg></span></div>
                <small style="color: red;" id="errorlogin"></small>
                <div class="password"><input type="password" style="border-color: <?php echo $inputbc; ?>;" id="password" name="password" placeholder="Password" value=""><span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-lock2-fill" viewBox="0 0 16 16"><path d="M7 6a1 1 0 0 1 2 0v1H7V6z"/><path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0z"/></svg></span></div>
                <small style="color: red;" id="errorpassword"></small>
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