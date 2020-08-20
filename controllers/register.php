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
