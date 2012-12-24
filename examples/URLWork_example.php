<?php
/**
 * URLWork_example.php
 *
 * This is file with example for URLWork class
 *
 * @category	examples
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with URLWork class
 */
require_once(dirname(__FILE__) . '/../classes/URLWork.php');

/**
 * Print current url
 */
//print URLWork::getCurrentPageURL();

/**
 * Simple URL site protection (true / false) (site http://example.com)
 */
//var_dump(URLWork::siteURLProtectionSimple());

/**
 * URL site protection (true / false) (site http://example.com)
 */
var_dump(URLWork::siteURLProtection());
?>