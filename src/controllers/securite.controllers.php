<?php 

require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."users.model.php");

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "connexion") {
            $_SESSION['post'] = $_POST;
            $login = $_POST['login'];
            $password = $_POST['password'];
            var_dump($_POST);
            connexion($login,$password);
        }
        if ($_POST['action'] == "inscription") {
            $subprenom = $_POST['subprenom'];
            $subnom = $_POST['subnom'];
            $sublogin = $_POST['sublogin'];
            $subpassword = $_POST['subpassword'];
            $subpassword2 = $_POST['subpassword2'];
            inscription($subprenom,$subnom,$sublogin,$subpassword,$subpassword2);
        }
    }
}

if ($_SERVER["REQUEST_METHOD"]== "GET") {

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "connexion") {
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
        }
        if ($_GET['action'] == "deconnexion") {
            deconnexion();
        }
        if ($_GET['action'] == "inscription") {
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."inscription.html.php");
        }
    } else {
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}

function connexion($login,$password)
{
    $messageError =[];
    if (!champ_rempli($login)) {
        $messageError['videlogin'] = "Champ obligatoire";
    }
    if (!champ_rempli($password)) {
        $messageError['videpassword'] = "Champ obligatoire";
    }
    if (!valide_login($login) ||!valide_password($password)) {
        $messageError['invalid'] = "Login ou Mot de Passe Invalide";
    }

    if (count($messageError) == 0) {
        $user = authentificate($login,$password);
        var_dump($user);
        if ($user == null) {
            $messageError['unauthentified'] = "Login ou Mot de Passe Incorrect";
            $_SESSION['error'] = $messageError;
            header("location:".WEBROOT);
            exit();
        }
        if (count($user) !=0) {
            $_SESSION[USER_KEY] = $user;
            header("location:".WEBROOT."?controller=user&action=accueil");
            exit();
        } else {
            $_SESSION['error'] = $messageError;
            header("location:".WEBROOT);
            exit();
        }
    } else {
        $_SESSION['error'] = $messageError;
        header("location:".WEBROOT);
        exit();
    }
}

function deconnexion()
{
    session_destroy();
    header("location:".WEBROOT);
    exit();
}

function inscription($prenom,$nom,$login,$password,$cpassword)
{
    $messageErrorI =[];
    if (!champ_rempli($login)) {
        $messageErrorI['videlogin'] = "Champ obligatoire";
    }
    if (!champ_rempli($password)) {
        $messageErrorI['videpassword'] = "Champ obligatoire";
    }
    if (!valide_login($login) ||!valide_password($password)) {
        $messageErrorI['invalid'] = "Login ou Mot de Pass Invalide";
    }
    if (!valide_confirm($password,$cpassword)) {
        $messageErrorI['confirm'] = "Confirmation du Mot de Passe Incorrect";
    }

    if (count($messageErrorI) == 0) {
        if (!login_present($login)) {
            subscribe_user($prenom,$nom,$login,$password);
            header("location:".WEBROOT."?controller=securite&action=inscription&true=true");
        } else {
            $messageErrorI['loginpresent'] = "login deja utilisé";
            $_SESSION['errori'] = $messageErrorI;
            header("location:".WEBROOT."?controller=securite&action=inscription");
        }
        
    } else {
        $_SESSION['errori'] = $messageErrorI;
        header("location:".WEBROOT."?controller=securite&action=inscription");
    }

}