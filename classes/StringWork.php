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
final class StringWork {
	
	/**
	 * generateRandomString
	 * 
	 * This function to generate random string
	 *
	 * @param integer $string_length
	 * @return string $random_string
	 */
	static public function generateRandomString($string_length = 10) {

		/**
		 * Set variable with characters
		 */
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	
		/**
		 * Generate random string in cycle
		 */
		$random_string = '';
	    
		for ($i = 0; $i < $string_length; $i++) {
	        $random_string .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    
	    /**
	     * Return random string
	     */
	    return $random_string;
	}

	/**
	 * removeNoneASCIIFromString
	 * 
	 * This function to remove none ASCII from string
	 *
	 * @param string	$string
	 * @return string	$clean
	 */
	static public function removeNoneASCIIFromString($string) {
		
		/**
		 * Clean our string from none ACII
		 */
		$clean = preg_replace('/[^(\x20-\x7F)]*/', '', $string);

		/**
		 * Return clean string from none ACII
		 */
		return $clean;
	}
	
	/**
	 * parseAndReplaceString
	 * 
	 * This function to parse and replace string
	 *
	 * @param string	$string
	 * @param array		$replace_array
	 * 
	 * @return string	$result
	 */
	static public function parseAndReplaceString($string, $replace_array) {
		
		/**
		 * Parse string and replace character(s)
		 */
		$result = str_replace(array_keys($replace_array), array_values($replace_array), $string);
		
		/**
		 * Return result
		 */
		return $result;
	}
	
	/**
	 * makeURLAndEmailClickable
	 * 
	 * This function parse string and replace URL and Email on clickable
	 *
	 * @param string	$string
	 * @return string/bool	$new_string/false
	 */
	static public function makeURLAndEmailClickable($string) {
		
		if ($string) {

			/**
			 * Strip HTML and PHP tags from a string
			 */
			$new_string = strip_tags($string);
			
			/**
			 * Convert all urls to links
			 */
			$message = preg_replace('#([\s|^])(www)#i', '$1http://$2', $new_string);
	
			$pattern = '#((http|https|ftp|telnet|news|gopher|file|wais):\/\/[^\s]+)#i';
	
			$replacement = '<a href="$1" target="_blank">$1</a>';
	
			$new_string = preg_replace($pattern, $replacement, $new_string);
	
	    	/**
			 *  Convert all E-mail matches to appropriate HTML links
			 */
			$pattern = '#([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.';
			
			$pattern .= '[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)#i';
			
			$replacement = '<a href="mailto:\\1">\\1</a>';
	
			$new_string = preg_replace($pattern, $replacement, $new_string);
	    
			/**
			 * Return
			 */
			return $new_string;
		} else {
			return false;
		}
	}
	
	/**
	 * shortenLongText
	 * 
	 * This function to shorten a long text
	 *
	 * @param string	$text
	 * @param integer	$length
	 * 
	 * @return string	$short_text
	 */
	static public function shortenLongText($text, $length = 32) {
		
		/**
		 * Truncate the item text if it is too long.
		 */
		if ($length > 0 and strlen($text) > $length) {
			
			/**
			 * Find the first space within the allowed length.
			 */
			$tmp = substr($text, 0, $length);
			
			$tmp = substr($tmp, 0, strrpos($tmp, ' '));
			
			/**
			 * If we don't have 3 characters of room, go to the second space within the limit.
			 */
			if (strlen($tmp) >= $length - 3) { 
				$tmp = substr($tmp, 0, strrpos($tmp, ' '));
			}
			
			$short_text = $tmp . '...';
		}
		
		/**
		 * Return short text
		 */
		return $short_text;
	}

	/**
	 * encryptOrDecryptString
	 * 
	 * This function encrypt or decrypt string
	 *
	 * @param string	$key
	 * @param string	$string
	 * @param integer	$decrypt
	 * 
	 * @return string/bolean
	 */
	static public function encryptOrDecryptString($key, $string, $decrypt) {

		if($decrypt) {
			
			/**
			 * Decrypt string
			 */
			$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
			
			/**
			 * Return string
			 */
			return $decrypted;
		} else {
			
			/**
			 * Encrypt string
			 */
			$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
			
			/**
			 * Return string
			 */
			return $encrypted;
		}

		return false;
	}
	
	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>