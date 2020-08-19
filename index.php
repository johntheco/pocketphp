<?php

/**
 * This is the entry script of PocketPHP server platform.
 * It initialize server's startup configuration and server's
 * route map by requiring configuration (config/config.php)
 * and routing (routes/index.php) scripts.
 * 
 * @todo Redo all dependency injections for `config` and
 * `routes` to the new `Aura/Di` architecture, like in
 * `auth.php` file.
 * 
 * 
 * 
 * @package PocketPHP
 * @version 0.0.1
 * @author  John Theco <john.theco.dev@gmail.com>
 * @license MIT
 * 
 * @link    https://gitlab.com/johntheco/pocketphp
 * @see     https://gitlab.com/johntheco/pocketphp#readme
 */


require_once('server/config.php');
require_once('server/routes.php');
require_once('server/auth.php');

?>