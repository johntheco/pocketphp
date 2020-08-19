<?php

// If admin has some cookies on him...
if(isset($_COOKIE['ID']) &&
   isset($_COOKIE['HASH']) &&
   isset($_COOKIE['EMAIL'])){

    session_start();

    // We need to get rid of these sessions
    $_SESSION[$_COOKIE['EMAIL']]['ID'] = NULL;
    $_SESSION[$_COOKIE['EMAIL']]['HASH'] = NULL;

    // Or just...
    session_destroy();

    // And we need to PUT THAT COOKIES DOWN!
    setcookie('ID', null, -1);
    setcookie('HASH', null, -1);
    setcookie('EMAIL', null, -1);
    
    // And redirect him to the admin login page...
    header('Location: /admin');
}
?>