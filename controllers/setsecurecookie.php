<?php

function SetSecureCookie($name, $value, $time){
    setcookie($name, $value, [
        'expires' => $time,
        'path' => '/',
        'domain' => 'pocketphp.org',
        // Must be `true` in production
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Strict'
    ]);
};

?>