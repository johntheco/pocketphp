<?php

session_start();

function AdminAuthMiddleware($successRoute=NULL){
    if(isset($_COOKIE['ID']) &&
       isset($_COOKIE['HASH']) &&
       isset($_COOKIE['EMAIL'])){
    
        // Check if these are equal to the session's one...
        $ID = $_COOKIE['ID'];
        $HASH = $_COOKIE['HASH'];
        $EMAIL = $_COOKIE['EMAIL'];
    
        $SESSION_ID = $_SESSION[$EMAIL]['ID'];
        $SESSION_HASH = $_SESSION[$EMAIL]['HASH'];
    
        if($ID != $SESSION_ID || $HASH != $SESSION_HASH){
            require(ROOT . '/controllers/admin/logout.php');
        } else {
            if(isset($successRoute)){
                header("Location: {$successRoute}");
            }
        }
    } else {
        // If cookies aren't set, we need to
        // redirect user to the login page...

        if($_SERVER['REQUEST_URI'] != '/admin/login'){
            header('Location: /admin/login');
        }
    }
}

?>