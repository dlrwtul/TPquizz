<?php 

require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."users.model.php");

if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if (isset($_GET['action'])) {
        
        if (!is_connected()) {
            header("location:".WEBROOT);
            exit();
        }
        if ($_GET['action'] == "accueil") {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
        if ($_GET['action'] == "inscription") {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "inscription") {
            $admprenom = $_POST['admprenom'];
            $admnom = $_POST['admnom'];
            $admlogin = $_POST['admlogin'];
            $admpassword = $_POST['admpassword'];
            $admpassword2 = $_POST['admpassword2'];
            inscription_admin($admprenom,$admnom,$admlogin,$admpassword,$admpassword2);
        }
    }
}

function inscription_admin($prenom,$nom,$login,$password,$cpassword)
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
            subscribe_admin($prenom,$nom,$login,$password);
            header("Location:".WEBROOT."?controller=user&action=accueil&true=true");        
        } else {
            $messageErrorI['loginpresent'] = "login deja utilisé";
            $_SESSION['errori'] = $messageErrorI;
            header("Location:".WEBROOT."?controller=user&action=accueil");        
        }
        
    } else {
        $_SESSION['errori'] = $messageErrorI;
        header("Location:".WEBROOT."?controller=user&action=accueil");        
    }
}