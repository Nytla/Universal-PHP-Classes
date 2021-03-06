<?php
/**
 * SPLLibraryPrint_example.php
 *
 * This is file with example for SPLLibraryPrint class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with SPLLibraryPrint class
 */
require_once(dirname(__FILE__) . '/../classes/SPLLibraryPrint.php');

/**
 * Print all SPL classes and his methods
 */
print_r(SPLLibraryPrint::printSLPClassesAndMethods());
?>