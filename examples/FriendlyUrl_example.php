<?php
/**
 * FrendlyUrl.php
 *
 * This is file with example for FrendlyUrl class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with FrendlyUrl class
 */
require_once(dirname(__FILE__) . '/../classes/FriendlyUrl.php');

/**
 * Create copy of FrendlyUrl object
 */
$object = new FriendlyUrl();

/**
 * Set array with bad words
 */
$bad_words = array(
	'a',
	'and',
	'the',
	'an',
	'it',
	'is',
	'with',
	'can',
	'of',
	'why',
	'not'
);

/**
 * Set variable with separator of words
 */
$sepatator = '_';

/**
 * Set variable with string
 */
$words = 'This is string a little example and big mistake';

print $object -> generateSeoLink($words, $sepatator, $bad_words, true);
?>