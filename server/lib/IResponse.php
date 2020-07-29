<?php

/**
 * This file contains the interface that the Response
 * class must implement. This interface include method,
 * which checks if layout and rendering view exists, and
 * then sends the requested view to the client. The
 * Response class must have the implementation for this
 * method.
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


/** ===== IResponse Interface ===== **/
/** =============================== **/

interface IResponse {
    public function render($view, $args);
}

?>