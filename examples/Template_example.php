<?php
/**
 * Template_example.php
 *
 * This is file with example for Template class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with Template class
 */
require_once(dirname(__FILE__) . '/../classes/Template.php');

/**
 * Create copy of Template object
 */
$object = new Template();

/**
 * Set array with parameters for our template 
 */
$params = array(
	"title" => 'Example page',
	"text"	=> 'small template example.'
);

/**
 * Set path to aou template
 */
$template_path = dirname(__FILE__) . '/example.html';

/**
 * Render our template and print
 */
print $object -> renderTemplate($template_path, $params);
?>