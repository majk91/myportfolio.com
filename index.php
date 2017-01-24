<?php 
    require_once 'core/library/main.php';
    require_once 'core/library/validator.php';
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
