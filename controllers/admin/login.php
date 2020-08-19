<?php

/**
 * Requiring basic MySQL connection class.
 */
require_once(ROOT . '/controllers/connection.php');



/**
 * Preparing data.
 * 
 * TODO: create addition to the request object, which will encapsulate all
 *       POST data to avoid straightforward access to superglobal variables.
 * TODO: also it would be interesting to create special object for anonymous
 *       function, which could automatically encapsulate POST data... I think.
 */

$email = $_POST['email'];
$password = $_POST['password'];

$data = array();
$data['email'] = $email;
$data['password'] = $password;

/**
 * Preparing SQL query.
 */
$login_query = function($connection, $data){

    // Making query to MySQL databases to catch our admin emails...
    $query = "SELECT users.user_pass FROM users
        INNER JOIN usermeta ON users.ID = usermeta.user_id AND
                               usermeta.meta_key = 'role' AND
                               usermeta.meta_value = 'admin'
        WHERE user_email = '{$data['email']}'";
    $result = mysqli_query($connection, $query);

    // If we didn't find anyone with that email,
    // redirecting to the /admin/login page with
    // error..
    if(!$result->num_rows){
        // Set cookies with warning
        header('Location: /admin/login');
    } else {
        // Grabbing only first thing. I don't really know how
        // to handle error, where you can get to identical
        // records in database with equal emails, and don't really
        // know, if I should.
        // This is gotta be not really common thing in broad practice,
        // I suppose, but still I'd be goot to take precautions, just
        // in case. Deal with it later.
        // 
        // If password has been successfully verified - just redirect
        // admin to the dashboard without any further hesitation. In
        // other case, we need to redirect user to login page with 
        // error.

        $hash = $result->fetch_assoc()['user_pass'];
        if(password_verify($data['password'], $hash)){

            session_start();

            // Setting admin sessions
            $ID = random_int(10000, 99999);
            $HASH = crypt($data['email'], time());
            $_SESSION[$data['email']]['ID'] = $ID;
            $_SESSION[$data['email']]['HASH'] = $HASH;

            // Setting admin cookies for one day
            setcookie('ID', $ID, time()+24*3600);
            setcookie('HASH', $HASH, time()+24*3600);
            setcookie('EMAIL', $data['email'], time()+24*3600);
            // Creating sessions
            // Creating cookies

            header('Location: /admin/dashboard');
        } else {
            // Error... how to make it?
            // With cookies!

            header('Location: /admin/login');
        }
    }
};

/**
 * Establishing connection.
 */
$login = new Connection($login_query, $data);
