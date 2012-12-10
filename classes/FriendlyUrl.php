<?php
/**
 * FriendlyUrl.php
 *
 * This is file with FrendlyUrl class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * FriendlyUrl
 * 
 * This is frendly url class
 * 
 * @version 0.1
 */
class FriendlyUrl {
	
	/**
	 * Takes the input, scrubs bad characters
	 *
	 * @param string $input
	 * @param string $replace
	 * @param array $words_array
	 * @param boolean $remove_words
	 * 
	 * @return string
	 */
	public function generateSeoLink($input, $separator = '-', $words_array = array(), $remove_words = true) {

		/**
		 * Make it lowercase
		 */
		$preg_low = preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($input));
		
		/**
		 * Remove punctuation
		 */
		$preg_punct = preg_replace(' /\+/', ' ', $preg_low);
		
		/**
		 * Remove multiple/leading/ending spaces
		 */
		$return = trim($preg_punct);
		
		/**
		 * Remove words, if not helpful to seo (i like my defaults list in remove_words(), so I wont pass that array)
		 */
		if($remove_words) { 
			$return = $this -> removeWords($return, $separator, $words_array);
		}

		/**
		 * Convert the spaces to whatever the user wants (usually a dash or underscore.. then return the value.)
		 */
		return str_replace(' ', $separator, $return);
	}

	/**
	 * Takes an input, scrubs unnecessary words
	 *
	 * @param string $input
	 * @param string $separator
	 * @param array $words_array
	 * @param boolean $unique_words
	 * 
	 * @return string
	 */
	public function removeWords($input, $separator, $words_array = array(), $unique_words = true) {

		/**
		 * Separate all words based on spaces
		 */
		$input_array = explode(' ',$input);
		
		/**
		 * Create the return array
		 */
		$return = array();
		
		/**
		 * Loops through words, remove bad words, keep good ones
		 */
		foreach($input_array as $word) {

			/**
			 * If it's a word we should add...
			 */
			if(!in_array($word, $words_array) and ($unique_words ? !in_array($word, $return) : true)) {
				$return[] = $word;
			}
		}
		
		/**
		 * Return good words separated by dashes
		 */
		return implode($separator, $return);
	}
}
?>