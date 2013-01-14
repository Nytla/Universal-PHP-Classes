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
//var_dump(URLWork::siteURLProtection());

/**
 * Create variable with url and her params
 */
$url = 'hl=ru&newwindow=1&q=parse+url+params+php&bav=on.2,or.r_gc.r_pw.r_cp.r_qf.&bvm=bv.1355534169,d.d2k&bpcl=40096503&biw=1760&bih=842&um=1&ie=UTF-8&sa=N&tab=wT#ru';

/**
 * Create variable with equals
 */
$equals = '=';

/**
 * Create variable with separator
 */
$sepatator = '&';

/**
 * Parse and print our url's params
 */
print_r(URLWork::parseUrlParams($url, $equals, $sepatator));
?>