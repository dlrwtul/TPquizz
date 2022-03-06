<?php 
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."users.model.php");

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
        if ($_POST['action'] == "question") {
            $question = $_POST['questions'];
            $nbrpts = $_POST['nbrpts'];
            $typerep = $_POST['typerep'];
            $alphabet = ["a","b","c","d"];
            $reponses = [];
            foreach ($alphabet as $key => $value) {
                if (isset($_POST[$value])) {
                    $reponses[]= $_POST[$value];
                }
            }
            
            if ($typerep ==  'text') {
                $reponses[]="<input>";
                $correct=$_POST['reponse'];
            } elseif ($typerep ==  'radio') {
                $correct= $_POST['reponse'];
            }else {
                for ($i=0; $i < 4; $i++) { 
                    if (isset($_POST["rep".$i])) {
                        $correct[]= $_POST["rep".$i];
                    }
                }
            }
            ajout_question($question,$nbrpts,$reponses,$correct);
        }
    }

}

if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if (isset($_GET['action'])) {
        
        if (!is_connected()) {
            header("location:".WEBROOT);
            exit();
        }
        if ($_GET['action'] == "accueil") {
            if (isset($_GET['view'])) {
                $content_for_views= "listerjoueurs";
                switch ($_GET['view']) {
                    case 'listerquestions':
                        print_right("listes.questions");
                        break;
                    case 'ajouteradmin':
                        print_right("ajout.admin");
                        break;
                    case 'listerjoueurs':
                        print_right("listes.joueurs");
                        break;
                    case 'ajouterquestions':
                        print_right("ajout.question");
                        break;
                    default:
                        
                        break;
                }
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
            } else {
                $content_for_views= "<div class="."droite"." style="."color:green;font-size:5em;".">hello admin</div>";
                require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
            }
        }
        if ($_GET['action'] == "inscription") {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
    }
}

function print_right($adresse)
{
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR.$adresse.".html.php");
    $content_for_views = ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
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
            subscribe($prenom,$nom,$login,$password,"ADMIN");
            header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouteradmin&true=true");        
        } else {
            $messageErrorI['loginpresent'] = "login deja utilisé";
            $_SESSION['errori'] = $messageErrorI;
            header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouteradmin");        
        }
        
    } else {
        $_SESSION['errori'] = $messageErrorI;
        header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouteradmin");        
    }
}

function ajout_question($question,$nbrpts,$reponses,$correct)
{
    $messageErrorQ = [];
    if (!champ_rempli($question)) {
        $messageErrorQ['videquestion'] = "Champ obligatoire";
    }
    if (!champ_rempli($nbrpts)) {
        $messageErrorQ['videnbrpts'] = "Champ obligatoire";
    }
    if (!champ_rempli($reponses)) {
        $messageErrorQ['videreponses'] = "Champ obligatoire";
    }
    if (!champ_rempli($correct)) {
        $messageErrorQ['videcorrect'] = "Champ obligatoire";
    }

    if (count($messageErrorQ) == 0) {
        if (!question_presente($question)) {
            new_question($question,$nbrpts,$reponses,$correct);
            header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouterquestions&true=true");        
            exit();
        } else {
            $messageErrorQ['questionpresente'] = "question deja inscrite";
            $_SESSION['errorq'] = $messageErrorQ;
            header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouterquestions"); 
            exit();
        }
    } else {
        $_SESSION['errorq']['globalerror'] = "veuillez saisir tout les champs!!!";
        header("Location:".WEBROOT."?controller=user&action=accueil&view=ajouterquestions"); 
        exit();
    }
    
}