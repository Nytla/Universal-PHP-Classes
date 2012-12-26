<?php
/**
 * URLWork.php
 *
 * This is file with URLWork class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * URLWork
 * 
 * This class to work with URL
 * 
 * @version 0.1
 */
final class URLWork {

	/**
	 * getCurrentPageURL
	 * 
	 * This function to get corrent page url
	 *
	 * @return string
	 */
	static public function getCurrentPageURL() {

		/**
		 * Set url protocol
		 */
		$page_url = 'http';

		/**
		 * If protocol https then set him
		 */
		if (!empty($_SERVER['HTTPS'])) {
			$page_url .= "s";
		}

		/**
		 * Set colon and right slashes
		 */
		$page_url .= "://";

		/**
		 * If used port then set him
		 */
		$page_url .= ($_SERVER["SERVER_PORT"] != '80') ? $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"] : $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];

		/**
		 * Return current page url
		 */
		return $page_url;
	}

	/**
	 * siteURLProtectionSimple
	 *
	 * This function check site sipmle protection 
	 *
	 * @return boolean
	 */
	static public function siteURLProtectionSimple() {
		return (chr(101).chr(120).chr(97).chr(109).chr(112).chr(108).chr(101).chr(46).chr(99).chr(111).chr(109) == $_SERVER['HTTP_HOST']) ? true : false;
	}

	/**
	 * siteProtection
	 *
	 * This function check site protection (part url)
	 *
	 * @return boolean
	 */
	static public function siteURLProtection() {
		
		$str = $_SERVER['HTTP_HOST'];
	
		$search = (string) chr(101).chr(120).chr(97).chr(109).chr(112).chr(108).chr(101);
		
		$position = strpos($str, $search);
	
		return ($position === false) ? false : true;
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>