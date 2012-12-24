<?php
/**
 * ParsersWork_example.php
 *
 * This is file with example for ParsersWork class
 *
 * @category	examples
 * @copyright	2012
 * @author	Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with ParsersWork class
 */
require_once(dirname(__FILE__) . '/../classes/ParsersWork.php');

/**
 * Set variable with url
 */
$url = 'http://graph.facebook.com/btaylor';

/**
 * Print data (CURL)
 */
//print_r(ParsersWork::getJSONDataFromURLCURL($url));

/**
 * Print user name (CURL)
 */
//print_r(ParsersWork::getJSONDataFromURLCURL($url) -> name);

/**
 * Print data (file_get_contents)
 */
//print_r(ParsersWork::getJSONDataFromURL($url));

/**
 * Print user name (file_get_contents)
 */
//print_r(ParsersWork::getJSONDataFromURL($url) -> name);

/**
 * Set url for parsing
 */
$url = 'http://www.xakep.ru/post/35410/default.asp';

/**
 * Parse and print all articles from url content (CURL)
 */
//print ParsersWork::htmlParserCURL($url);

/**
 * Parse and print all articles from url content (file_get_contents)
 */
print ParsersWork::htmlParser($url);
?>