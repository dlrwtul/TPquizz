<?php 

if (isset($_REQUEST['controller'])) {
    
    switch ($_REQUEST['controller']) {
        case 'securite':
            require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."securite.controllers.php");
            break;
        case 'user':
            require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."users.controllers.php");
            break;
        default:
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."error.html.php");
            break;
    }
}else {
    require_once(PATH_SRC."controllers".DIRECTORY_SEPARATOR."securite.controllers.php");
}