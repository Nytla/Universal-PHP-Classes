<?php
/**
 * ValidateData_example.php.php
 *
 * This is file with example for ValidateData class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with ValidateData class
 */
require_once(dirname(__FILE__) . '/../classes/ValidateData.php');

/**
 * Check validation on the boolean
 */
$boolean = true;

//ValidateData::filterValidate($boolean, ValidateData::DATA_BOOLEAN);

if (ValidateData::filterValidate($boolean, ValidateData::DATA_BOOLEAN)) {
	echo 'Boolean is validated. <br>';
} else {
	echo 'Boolean is not validated. <br>';
}

/**
 * Check validation on the email address
 */
$email = 'exampl@email.com';

//ValidateData::filterValidate($email, ValidateData::DATA_EMAIL);

if (ValidateData::filterValidate($email, ValidateData::DATA_EMAIL)) {
	echo 'Email is validated. <br>';
} else {
	echo 'Email is not validated. <br>';
}

/**
 * Check validation on the float
 */
$float = 0.1;

//ValidateData::filterValidate($float, ValidateData::DATA_FLOAT);

if (ValidateData::filterValidate($float, ValidateData::DATA_FLOAT)) {
	echo 'Float is validated. <br>';
} else {
	echo 'Float is not validated. <br>';
}

/**
 * Check validation on the integer
 */
$integer = 1;

//ValidateData::filterValidate($integer, ValidateData::DATA_INT);

if (ValidateData::filterValidate($integer, ValidateData::DATA_INT)) {
	echo 'Integer is validated. <br>';
} else {
	echo 'Integer is not validated. <br>';
}

/**
 * Check validation on the IP
 */
$ip = '127.0.0.1';

//ValidateData::filterValidate($ip, ValidateData::DATA_IP);

if (ValidateData::filterValidate($ip, ValidateData::DATA_IP)) {
	echo 'IP is validated. <br>';
} else {
	echo 'IP is not validated. <br>';
}

/**
 * Check validation on the URL
 */
$url = 'http://example.com/';

//ValidateData::filterValidate($url, ValidateData::DATA_URL);

if (ValidateData::filterValidate($url, ValidateData::DATA_URL)) {
	echo 'URL is validated. <br>';
} else {
	echo 'URL is not validated. <br>';
}

/**
 * Check validation on the login
 */
$login = 'mytestlogin';

//ValidateData::filterValidate($login, ValidateData::DATA_REGEXP, ValidateData::$_regex_login);

if (ValidateData::filterValidate($login, ValidateData::DATA_REGEXP, ValidateData::$_regex_login)) {
	echo 'Login is validated. <br>';
} else {
	echo 'Login is not validated. <br>';
}

/**
 * Check validation on the password
 */
$password = 'my_test_password_1-';

//ValidateData::filterValidate($password, ValidateData::DATA_REGEXP, ValidateData::$_regex_password);

if (ValidateData::filterValidate($password, ValidateData::DATA_REGEXP, ValidateData::$_regex_password)) {
	echo 'Password is validated. <br>';
} else {
	echo 'Password is not validated. <br>';
}
?>