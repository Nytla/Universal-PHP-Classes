<?php
/**
 * Calendar_example.php
 *
 * This is file with example for Calendar class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with Calendar class
 */
require_once(dirname(__FILE__) . '/../classes/Calendar.php');

/**
 * Print calendar an array
 */
print_r(Calendar::calendarPrint(11, 2012));
?>