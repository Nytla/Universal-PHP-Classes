<?php
/**
 * StringWork.php
 *
 * This is file with StringWork class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * StringWork
 * 
 * This class to work with string
 * 
 * @version 0.1
 */
final class ParsersWork {
	
	/**
	 * getJSONDataFromURLCURL
	 * 
	 * This function to get json data from url
	 *
	 * @param string $url
	 * @return json
	 */
	static public function getJSONDataFromURLCURL($url) {

		/**
		 * Initialize curl
		 */
		$ch = curl_init();

		/**
		 * Set an option for a cURL transfer
		 */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		curl_setopt($ch, CURLOPT_URL, $url);
		
		/**
		 * Set variable with content
		 */
		$data = curl_exec($ch);

		/**
		 * Close curl
		 */
		curl_close($ch);

		/**
		 * Return data in JSON format
		 */
		return json_decode($data);
	}
	
	/**
	 * getJSONDataFromURL
	 * 
	 * This function to get json data from url (file_get_contents)
	 *
	 * @param string $url
	 * @return json
	 */
	static public function getJSONDataFromURL($url) {
		
		/**
		 * Get data from url
		 */
		$data = file_get_contents($url);
		
		/**
		 * Return data in JSON format
		 */
		return json_decode($data);
	}
	
	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>