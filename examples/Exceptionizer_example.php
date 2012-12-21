<?php
/**
 * Exceptionizer_example.php
 *
 * This is file with example for Exceptionizer class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with Exceptionizer class
 */
require_once(dirname(__FILE__) . '/../classes/Exceptionizer.php');

/**
 * Test
 * 
 * This is example of exceptions
 */
class Test extends Exceptionizer {

	/**
	 * testFuncOne
	 * 
	 * This is example of exception catch E_NOTICE
	 */
	public function testFuncOne() {

		try {
			$test + 10;
			
		} catch (E_NOTICE $e) {
			echo "<div><b>Перехвачено замечание E_NOTICE!</b><br>\n", $e, "</div>";
		}
	}
	
	/**
	 * testFuncTwo
	 * 
	 * This is example of exception catch E_WARNING
	 */
	public function testFuncTwo() {

		try {
			$zirro = 0;

			$test = 10 / $zirro;
			
		} catch (E_WARNING $e) {
			echo "<div><b>Перехвачено предупреждение E_WARNING!</b><br>\n", $e, "</div>";
		}
	}
}

$object = new Test();

/**
 * E_NOTICE
 */
//$object -> testFuncOne();

/**
 * E_WARNING
 */
$object -> testFuncTwo();

##########################################
# Read about Errors and Logging constants - http://php.net/manual/en/errorfunc.constants.php
##########################################
?>