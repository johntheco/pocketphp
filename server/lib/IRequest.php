<?php

/**
 * This file contains the interface that the 
 * Request class must implement. This interface
 * include method, which retrieves data from the
 * request body. The Request class must have the
 * implementation for this method.
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


/** ===== IRequest Interface ===== **/
/** ============================== **/

interface IRequest {
    public function getBody();
}

?>