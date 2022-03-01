<?php 

if ($_SERVER["REQUEST_METHOD"]=="GET") {
    if (isset($_GET['action'])) {
        /* if (!is_connected()) {
            header("location:".WEBROOT);
        } */
        if ($_GET['action'] == "accueil") {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
    }
}