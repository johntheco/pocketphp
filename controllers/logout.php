<?php

require_once(ROOT . '/controllers/setsecurecookie.php');

// If user has come cookies on him...
if(isset($_COOKIE['ID']) ||
   isset($_COOKIE['HASH']) ||
   isset($_COOKIE['EMAIL'])){

    session_start();
    session_regenerate_id();

    // We need to get rid of these sessions
    $_SESSION[$_COOKIE['EMAIL']]['ID'] = NULL;
    $_SESSION[$_COOKIE['EMAIL']]['HASH'] = NULL;
    $_SESSION[$_COOKIE['EMAIL']]['ROLE'] = NULL;

    // Or just...
    session_destroy();

    // And we need to PUT THAT COOKIES DOWN!
    SetSecureCookie('ID', null, -1);
    SetSecureCookie('HASH', null, -1);
    SetSecureCookie('EMAIL', null, -1);
    SetSecureCookie('ROLE', null, -1);

    // And redirect him to the home page...
    header('Location: /home');
}

?>