<?php
    session_start();

    require_once 'core/configs/main.php';
    require_once 'core/library/main.php';
    require_once 'core/library/validator.php';
    require_once 'core/library/db.php';



    $url = strtolower($_GET['url']);

    $urlSegments = explode("/", $url);

    $cntrName = (empty($urlSegments[0])) ? "main" : $urlSegments[0];
    $actionName = (empty($urlSegments[1])) ? "action_index" : 'action_'.$urlSegments[1];
    
    if(file_exists("core/controllers/".$cntrName.".php")){
        require_once "core/controllers/".$cntrName.".php";

        if(function_exists($actionName)){
            $actionName();
        }else{
            show404();
        }
    }else{
        show404();
    }

?>
    </div><!--.site-wrapper-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/slider.js"></script>
    <script src="../js/function.js"></script>


</body>
</html>

