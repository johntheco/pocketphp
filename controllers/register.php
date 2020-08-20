<?php

/**
 * Requiring basic MySQL connection class
 * and `Set Secure Cookie` function.
 */
require_once(ROOT . '/controllers/connection.php');
require_once(ROOT . '/controllers/setsecurecookie.php');



/**
 * Preparing data.
 * 
 * TODO: create addition to the request object, which will encapsulate all
 *       POST data to avoid straightforward access to superglobal variables.
 * TODO: also it would be interesting to create special object for anonymous
 *       function, which could automatically encapsulate POST data... I think.
 */

$login = htmlspecialchars($_POST['login']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);
$repassword = htmlspecialchars($_POST['repassword']);

// If passwords doesn't match..
if($password != $repassword){
    SetSecureCookie('ERROR', 'Password doesn\'t match', time()+10);
    header('Location: /register');
} else {
    $password = password_hash($password, PASSWORD_BCRYPT);
}

// Preparing data to insert...
$data = array();
$data['login'] = $login;
$data['email'] = $email;
$data['password'] = $password;

$register_query = function($connection, $data){

    // Making query to MySQL databases to insert our registrator's data...
    $query = "INSERT INTO users (user_login, user_pass, user_email)
        VALUES ('{$data['login']}', '{$data['password']}', '{$data['email']}')";
    $result = mysqli_query($connection, $query);

    session_start();
    session_regenerate_id();

    // Setting user session
    $ID = random_int(10000, 99999);
    $HASH = crypt($data['email'], time());
    $_SESSION[$data['email']]['ID'] = $ID;
    $_SESSION[$data['email']]['HASH'] = $HASH;
    $_SESSION[$data['email']]['ROLE'] = 'user';

    // Setting user cookies for one day
    SetSecureCookie('ID', $ID, time()+24*3600);
    SetSecureCookie('HASH', $HASH, time()+24*3600);
    SetSecureCookie('EMAIL', $data['email'], time()+24*3600);
    SetSecureCookie('ROLE', 'user', time()+24*3600);

    header('Location: /home');

};

$register = new Connection($register_query, $data);
