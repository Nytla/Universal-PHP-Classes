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
	 * parseUrlParams
	 * 
	 * This function parse url params
	 *
	 * @param string $url_params
	 * @param string $equals
	 * @param string $separator
	 * 
	 * @return string / boolean
	 */
	static public function parseUrlParams($url_params, $equals, $separator) {
		
		if (isset($url_params) and !empty($url_params)) {
		
			$elements_array = explode($separator, $url_params);
			
			if (is_array($elements_array)) {
				
				foreach ($elements_array as $key => $value) {
					
					$array_params = explode($equals, $value);
					
					if (isset($array_params[0]) and isset($array_params[1])) {
					
						$params_array[$array_params[0]] = $array_params[1];
					}
				}
				
				return $params_array;
			}
			
		} else {
			return false;
		}
	}
	
	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>