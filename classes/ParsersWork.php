<?php
/**
 * ParsersWork.php
 *
 * This is file with ParsersWork class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * ParsersWork
 * 
 * This class to work with parsers
 * 
 * @version 0.1
 */
final class ParsersWork extends DOMDocument {
	
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
	 * htmlParserCURL
	 * 
	 * This function to parse our html content (url) and get all articles (CURL)
	 *
	 * @param string	$url
	 * @return string	$articles
	 */
	static public function htmlParserCURL($url) {
		
		/**
		 * Initialize curl
		 */
		$ch = curl_init();
		
		/**
		 * Set an option for a cURL transfer
		 */
		curl_setopt($ch, CURLOPT_URL, $url);
		
		curl_setopt($ch , CURLOPT_USERAGENT, "Mozilla/5.0");

		curl_setopt($ch , CURLOPT_RETURNTRANSFER , 1);
		
		/**
		 * Set variable with content from url
		 */
		$content = curl_exec($ch);
		
		/**
		 * Close curl
		 */
		curl_close($ch);
		
		/**
		 * Extract all articles from html content
		 */
		preg_match_all("/<[p]+>(.*)<\/p>/isU", $content, $matches, PREG_PATTERN_ORDER);
		
		/**
		 * Create string with all articcles
		 */
		$articles = '';

		for ($i = 0; $i < count($matches[0]); $i++) { 
			
			$articles .= $matches[0][$i] . "\r\n";
		}
		
		/**
		 * Return all articles
		 */
		return $articles;
	}

	/**
	 * htmlParserCURL
	 * 
	 * This function to parse our html content (url) and get all articles 
	 *
	 * @param string	$url
	 * @return string	$articles
	 */
	static public function htmlParser($url) {
		
		/**
		 * Get data from url
		 */
		$content = file_get_contents($url);
		
		/**
		 * Extract all articles from html content
		 */
		preg_match_all("/<[p]+>(.*)<\/p>/isU", $content, $matches, PREG_PATTERN_ORDER);
		
		/**
		 * Create string with all articcles
		 */
		$articles = '';

		for ($i = 0; $i < count($matches[0]); $i++) { 
			
			$articles .= $matches[0][$i] . "\r\n";
		}
		
		/**
		 * Return all articles
		 */
		return $articles;
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>