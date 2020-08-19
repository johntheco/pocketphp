<?php

namespace Aura\Auth;


class AuthFactory
{
    public function __construct(array $cookie){
        // echo "Aura\Auth\AuthFactory<br>";
    }

    public function newInstance()
    {
        return new Auth();
    }
}

?>