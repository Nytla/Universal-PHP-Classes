<?php
/**
 * ValidateData.php
 *
 * This is file with ValidateData class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * ValidateData
 * 
 * This class validate data
 * 
 * @version 0.1
 */
final class ValidateData {

	/**
	 * DATA_BOOLEAN
	 * 
	 * @constant string	This is data of type boolean validade
	 */
	const DATA_BOOLEAN = FILTER_VALIDATE_BOOLEAN;

	/**
	 * DATA_EMAIL
	 * 
	 * @constant string	This is email validade
	 */
	const DATA_EMAIL = FILTER_VALIDATE_EMAIL;

	/**
	 * DATA_FLOAT
	 * 
	 * @constant string	This is data of type float validade
	 */
	const DATA_FLOAT = FILTER_VALIDATE_FLOAT;

	/**
	 * DATA_INT
	 * 
	 * @constant string	This is data of type integer validade
	 */
	const DATA_INT = FILTER_VALIDATE_INT;

	/**
	 * DATA_IP
	 * 
	 * @constant string	This is IP validade
	 */
	const DATA_IP = FILTER_VALIDATE_IP;

	/**
	 * DATA_URL
	 * 
	 * @constant string	This is URL validade
	 */
	const DATA_URL = FILTER_VALIDATE_URL;
	
	/**
	 * DATA_REGEXP
	 * 
	 * @constant string	This is REGEXP validade
	 */
	const DATA_REGEXP = FILTER_VALIDATE_REGEXP;

	/**
	 * _regexp_login
	 * 
	 * @var array	This is regexp for string validade
	 */
	static public $_regex_login = array(
		"options" => array(
			"regexp"=>"/^[a-zA-Z]+$/"
		)
	);

	/**
	 * _regexp_password
	 * 
	 * @var array	This is regexp for string validade
	 */
	static public $_regex_password = array(
		"options" => array(
			"regexp"=>"/^[a-zA-Z0-9_-]+$/"
		)
	);

	/**
	 * filterValidate
	 *
	 * This function validate our data (boolean, email, float, integer, ip, url, string (login or password))
	 *
	 * @param (boolean, email, float, integer, ip, url, string) $data
	 * @param string $filter_type
	 * @param array $regex_array
	 * 
	 * @return string / boolean
	 */
	static public function filterValidate($data, $filter_type, $regex_array = '') {
		return ($filter_type == FILTER_VALIDATE_REGEXP) ? filter_var($data, (int) $filter_type, $regex_array) : filter_var($data, (int) $filter_type);
	}
}
?>
