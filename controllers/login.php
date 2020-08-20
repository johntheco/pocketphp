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

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$data = array();
$data['email'] = $email;
$data['password'] = $password;

/**
 * Preparing SQL query.
 */
$login_query = function($connection, $data){
    
    // Making query to MySQL databases to catch our user emails...
    $query = "SELECT user_pass FROM users
        WHERE user_email = '{$data['email']}'";
    $result = mysqli_query($connection, $query);

    // If we didn't find anyone with that email,
    // redirecting to the /login page with error.
    if(!$result->num_rows){
        // Set cookies with warning
        SetSecureCookie('ERROR', 'Email not found', time()+10);
        header('Location: /login');
    } else {
        $hash = $result->fetch_assoc()['user_pass'];
        if(password_verify($data['password'], $hash)){

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
        } else {
            // Set cookies with warning
            SetSecureCookie('ERROR', 'Wrong password', time()+10);
            header('Location: /login');
        }
    }
};

/**
 * Establishing connection.
 */
$login = new Connection($login_query, $data);
