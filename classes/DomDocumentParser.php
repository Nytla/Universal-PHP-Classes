<?php
/**
 * DomDocumentParser.php
 *
 * This is file with DomDocumentParser class
 * 
 * @category	classes
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Cookie
 * 
 * This class work with DomDocument class
 * 
 * @version 0.1
 */
final class DomDocumentParser {

	/**
	 * parseHTMLPage
	 * 
	 * This function html page
	 *
	 * @param string $url
	 * @return string $values
	 */
	public function parseHTMLPage($url) {
		
		/**
		 * Get data from url
		 */
		$html = file_get_contents($url);
		
		/**
		 * Create new dom object
		 */
		$dom = new DomDocument();

		/**
		 * Load html in object
		 */
		$dom -> loadHTML($html);
		
		/**
		 * Get element by tag name
		 */
		$div_tags = $dom -> getElementsByTagName('div');

		$div_tags = $div_tags -> item(0) -> getElementsByTagName('div');
		
		/**
		 * Loop in lines
		 */
		$values = '';

		foreach ($div_tags as $div_tag) {
			
			$h_tag = $div_tag -> getElementsByTagName('h6');
			
			if (isset($h_tag -> item(0) -> nodeValue)) {
			
				$values .= $h_tag -> item(0) -> nodeValue . PHP_EOL . '<br>';
			}
		}
	
		return $values;
	}
	
	/**
	 * parseXMLPage
	 * 
	 * This function parse xml page
	 *
	 * @param string $url
	 * @return string $values
	 */
	public function parseXMLPage($url) {
		
		/**
		 * Get data from url
		 */
//		$xml = file_get_contents($url);

		$dom = new DomDocument();

//		$dom -> loadXML($xml);
		
		$dom -> loadXML($url);
		
		$meta_tags = $dom -> getElementsByTagName('book');
		
		/**
		 * Loop in lines
		 */
		$values = '';
		
		foreach ($meta_tags as $meta_tag) {
			
			/**
			 * All cels by tag
			 */
//			$meta = $meta_tag -> textContent;
			
			/**
			 * Print value
			 */
			$values .= $meta_tag -> nodeValue . PHP_EOL . '<br>';
			
//			$values .= $cols -> item(0) -> nodeValue . '<br>';
		}
		
		return $values;
	}
}
?>