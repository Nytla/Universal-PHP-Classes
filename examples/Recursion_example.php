<?php
/**
 * Recursion_example.php
 *
 * This is file with example for Recursion class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with Recursion class
 */
require_once(dirname(__FILE__) . '/../classes/Recursion.php');

/**
 * Set array 
 */
$array = array(
	0, 1, 2, 3, 4, 
	5 => array(
		10, 20, 30
	), 
	6, 7, 8, 
	9 => array(
		1, 2, 3
	)
);


/**
 * Echo a array elements
 */
$mri = new MyRecursiveIterator($array);

foreach ($mri as $c => $v) {
	if ($mri->hasChildren()) {
		echo "$c has children: <br />";
		$mri->getChildren();
	} else {
		echo "$v <br />";
	}	
}