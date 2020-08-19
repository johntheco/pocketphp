<?php

session_start();
session_regenerate_id();

function AdminAuthMiddleware($successRoute=NULL){

    if(isset($_COOKIE['ID']) &&
       isset($_COOKIE['HASH']) &&
       isset($_COOKIE['EMAIL']) &&
       isset($_COOKIE['ROLE'])){
    
        // Check if these are equal to the session's one...
        $ID = $_COOKIE['ID'];
        $HASH = $_COOKIE['HASH'];
        $EMAIL = $_COOKIE['EMAIL'];
        $ROLE = $_COOKIE['ROLE'];
    
        $SESSION_ID = $_SESSION[$EMAIL]['ID'];
        $SESSION_HASH = $_SESSION[$EMAIL]['HASH'];
        $SESSION_ROLE = $_SESSION[$EMAIL]['ROLE'];

        if($ID != $SESSION_ID || $HASH != $SESSION_HASH || $ROLE != $SESSION_ROLE){
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