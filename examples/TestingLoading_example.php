<?php
/**
 * TestingLoading_example.php
 *
 * This is file with example for TestingLoading_example class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with TestingLoading class
 */
require_once(dirname(__FILE__) . '/../classes/TestingLoading.php');

/**
 * Create object of TestingLoading class for test this scripts 
 */
$object = new TestingLoading();

/**
 * Your code START
 */
for ($i = 0; $i < 100; $i++) {

	print $i . "\r\n";
}
/**
 * Your code FINISH
 */

/**
 * Calculate and print information about script loading
 */
print $object -> calculateAndPrintInfo();
?>