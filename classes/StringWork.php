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
	 * getStatesUSA
	 * 
	 * This function return states about post code of state
	 *
	 * @param string $post_code_states
	 * @return string / boolean
	 */
	static public function getStatesUSA($post_code_states) {

		/**
		 * Create the array with USA States
		 */
		$states = array(
			array('value'=>"AL",'name'=>'Alabama'),
			array('value'=>"AK",'name'=>'Alaska'),
			array('value'=>"AZ",'name'=>'Arizona'),
			array('value'=>"AR",'name'=>'Arkansas'),
			array('value'=>"CA",'name'=>'California'),
			array('value'=>"CO",'name'=>'Colorado'),
			array('value'=>"CT",'name'=>'Connecticut'),
			array('value'=>"DE",'name'=>'Delaware'),
			array('value'=>"DC",'name'=>'District of Columbia'),
			array('value'=>"FL",'name'=>'Florida'),
			array('value'=>"GA",'name'=>'Georgia'),
			array('value'=>"HI",'name'=>'Hawaii'),
			array('value'=>"ID",'name'=>'Idaho'),
			array('value'=>"IL",'name'=>'Illinois'),
			array('value'=>"IN",'name'=>'Indiana'),
			array('value'=>"IA",'name'=>'Iowa'),
			array('value'=>"KS",'name'=>'Kansas'),
			array('value'=>"KY",'name'=>'Kentucky'),
			array('value'=>"LA",'name'=>'Louisiana'),
			array('value'=>"ME",'name'=>'Maine'),
			array('value'=>"MD",'name'=>'Maryland'),
			array('value'=>"MA",'name'=>'Massachusetts'),
			array('value'=>"MI",'name'=>'Michigan'),
			array('value'=>"MN",'name'=>'Minnesota'),
			array('value'=>"MS",'name'=>'Mississippi'),
			array('value'=>"MO",'name'=>'Missouri'),
			array('value'=>"MT",'name'=>'Montana'),
			array('value'=>"NE",'name'=>'Nebraska'),
			array('value'=>"NV",'name'=>'Nevada'),
			array('value'=>"NH",'name'=>'New Hampshire'),
			array('value'=>"NJ",'name'=>'New Jersey'),
			array('value'=>"NM",'name'=>'New Mexico'),
			array('value'=>"NY",'name'=>'New York'),
			array('value'=>"NC",'name'=>'North Carolina'),
			array('value'=>"ND",'name'=>'North Dakota'),
			array('value'=>"OH",'name'=>'Ohio'),
			array('value'=>"OK",'name'=>'Oklahoma'),
			array('value'=>"OR",'name'=>'Oregon'),
			array('value'=>"PA",'name'=>'Pennsylvania'),
			array('value'=>"RI",'name'=>'Rhode Island'),
			array('value'=>"SC",'name'=>'South Carolina'),
			array('value'=>"SD",'name'=>'South Dakota'),
			array('value'=>"TN",'name'=>'Tennessee'),
			array('value'=>"TX",'name'=>'Texas'),
			array('value'=>"UT",'name'=>'Utah'),
			array('value'=>"VT",'name'=>'Vermont'),
			array('value'=>"VA",'name'=>'Virginia'),
			array('value'=>"WA",'name'=>'Washington'),
			array('value'=>"WV",'name'=>'West Virginia'),
			array('value'=>"WI",'name'=>'Wisconsin'),
			array('value'=>"WY",'name'=>'Wyoming')
		);
		
		/**
		 * Loop through the array
		 */
		if (isset($post_code_states) and !empty($post_code_states)) {
	        
			foreach($states as $s) {
	
				/**
				 * Find the matching abbreviation and return the name
				 */
				if($s['value'] == strtoupper($post_code_states)) {
					return $s['name'];
				}
			}
		} else {
			/**
		     * Return false if the abbreviation isn't found
		     */
			return false;	
		}
	}

	/**
	 * setCorrectEncoding
	 * 
	 * This function to set correct encoding od string
	 *
	 * @param string $text
	 * @param string $charset
	 * 
	 * @return string $text
	 */
	static public function setCorrectEncoding($text, $charset) {
		
		$current_encoding = mb_detect_encoding($text, 'auto');
		
		$text = iconv($current_encoding, $charset . '//IGNORE', $text);

		return $text;
	}

	/**
	 * mostCommonWords
	 * 
	 * This function get random phrase of you text
	 *
	 * @param string $str
	 * @param integer $cap
	 * 
	 * @return string
	 */
	static public function mostCommonWords($str, $cap = 5) {
		
		/**
		 * Get rid of everything except the words
		 */
		$letters=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$temp=str_replace($letters,'',strtolower($str));
		$temp=str_replace(array('1','2','3','4','5','6','7','8','9','0',' '),'',$temp);
		$str=str_replace(str_split($temp),'',$str);
		
		/**
		 * Create an array of words and an associative array of word appearance
		 */
		$words=explode(' ',$str);
		if($words) {
			
			foreach($words as $value) {
			if(str_replace(' ','',$value)!='')
				$w[$value]++;
			}
			arsort($w);
		}
		
		/**
		 * Create string of the most common words
		 */
		if($w) {
		
			$c=0;
			
			foreach($w as $key => $value) {
			
				if($c < $cap) {
					$ret.=$key.' ';
					// if you want to create an array of words, use the next line instead of the previous
					// $ret[]=$key;
				}
					$c++;
			}
		}

		/**
		 * Comment out this line if you're returning array, otherwise it gets rid of the last space
		 */
		$ret=substr($ret,0,-1);
		
		return $ret;
	}

	/**
	 * extractString
	 * 
	 * Enter description here...
	 *
	 * @param unknown_type $start
	 * @param unknown_type $end
	 * @param unknown_type $str
	 * @param unknown_type $include_flags
	 * 
	 * @return unknown
	 */
	static public function extractString($start, $end, $str, $include_flags = false) {
		
		/**
		 * Get the entire string starting from, and including, the start flag
		 */
		$str = stristr($str,$start);
		
		/**
		 * Get string after the end flag
		 */
		$f2 = stristr($str,$end);
		
		/**
		 * If you want to include the start and end flags in the return string
		 */
		if($include_flags) {
			return substr($str,0,(strlen($str)-(strlen($f2) - strlen($end))));
		} else {
			return substr($str,strlen($start),- strlen($f2));
		}
	}

	/**
	 * escapeXmlChars
	 * 
	 * This function to escape xml chars from string
	 *
	 * @param string $xml_string
	 * @return string $str
	 */
	static public function escapeXmlChars($xml_string) {

		/**
		 * Replaces the &, <, and > symbols
		 */
		$str = str_replace("<", "&lt;", $xml_string);
		
		$str = str_replace("&", "&amp;", $str);

		$str = str_replace(">", "&gt;", $str);

		return $str;
	}

	/**
	 * removeAllSymbols
	 * 
	 * This function remove all symbols from our string
	 *
	 * @param string $string
	 * @return string $new_string
	 */
	static public function removeAllSymbols($string) {
		$new_string = preg_replace("/[^a-zA-Z0-9s]/", "", $string);

		return $new_string;
	}

	/**
	 * removeTopWords100
	 * 
	 * This function remove top 100 words from string
	 *
	 * @param string $string
	 * @return string $new_string
	 */
	static public function removeTopWords100($string) {

		$words_array = array(' the ',' of ',' and ',' a ',' to ',' in ',' is ',' you ',' that ',' it ',' he ',' was ',' for ',' on ',' are ',' as ',' with ',' his ',' they ',' I ',' at ',' be ',' this ',' have ',' from ',' or ',' one ',' had ',' by ',' word ',' but ',' not ',' what ',' all ',' were ',' we ',' when ',' your ',' can ',' said ',' there ',' use ',' an ',' each ',' which ',' she ',' do ',' how ',' their ',' if ',' will ',' up ',' other ',' about ',' out ',' many ',' then ',' them ',' these ',' so ',' some ',' her ',' would ',' make ',' like ',' him ',' into ',' time ',' has ',' look ',' two ',' more ',' write ',' go ',' see ',' number ',' no ',' way ',' could ',' people ',' my ',' than ',' first ',' water ',' been ',' call ',' who ',' oil ',' its ',' now ',' find ',' long ',' down ',' day ',' did ',' get ',' come ',' made ',' may ',' part ',' click ');
		
		$new_string = str_replace($words_array, ' ', $string);
		
		return $new_string;
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>