    </div>
    <script src="
    <?php 
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'inscription':
                echo WEBROOT."js".DIRECTORY_SEPARATOR."inscription.js";
                break;
            case 'accueil':
                echo WEBROOT."js".DIRECTORY_SEPARATOR."accueil.js";
                break;
            default:
                echo WEBROOT."js".DIRECTORY_SEPARATOR."login.js";
                break;
        }
    } else {
        echo WEBROOT."js".DIRECTORY_SEPARATOR."login.js";
    }
    
     ?>
    
    
    
    "></script>
    
</body>
</html>