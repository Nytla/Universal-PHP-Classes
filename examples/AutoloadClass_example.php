<?php
/**
 * AutoloadClass_example.php
 *
 * This is file with example for autoload class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with AutoloadClass class
 */
require_once(dirname(__FILE__) . '/../classes/AutoloadClass.php');

/**
 * Validate email
 */
$email = 'exampl@email.com';

if (ValidateData::filterValidate($email, ValidateData::DATA_EMAIL)) {
	echo 'Email is validated. <br>';
} else {
	echo 'Email is not validated. <br>';
}
?>