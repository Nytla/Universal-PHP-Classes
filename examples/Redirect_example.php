<?php
/**
 * Redirect_example.php
 *
 * This is file with example for redirect class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with redirect class
 */
require_once(dirname(__FILE__) . '/../classes/Redirect.php');

/**
 * Use redirect
 */
//Redirect with http status 301
Redirect::uriRedirect(301, 'http://domain.com');

//Redirect with http status 404
//Redirect::uriRedirect(404, 'http://domain.com');
?>