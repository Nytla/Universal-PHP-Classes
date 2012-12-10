<?php
/**
 * Mailer.php
 *
 * This is file with mailer class
 *
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Mailer
 *
 * This class sent email.
 *
 * @version 1.0
 */
final class Mailer {

	/**
	 * _to_email
	 *
	 * @var string
	 */
	private $_to_email = 'example@domain.com';

	/**
	 * _from_email
	 *
	 * @var string
	 */
	private $_from_email = 'john@mailer.com';

	/**
	 * _from_name
	 *
	 * @var string
	 */
	private $_from_name = 'John Doe';

	/**
	 * _subject
	 *
	 * @var string
	 */
	private $_subject = 'This is subject';

	/**
	 * _encoding
	 *
	 * @var string
	 */
	private $_encoding = 'utf-8';

	/**
	 * _mime_version
	 *
	 * @var string
	 */
	private $_mime_version = '1.0';

	/**
	 * _headers
	 *
	 * @var null
	 */
	private $_headers;

	/**
	 * emailSent
	 * 
	 * This function sent email 
	 * 
	 * @param string 	$body
	 * @return boolean	$mailer
	 */
	public function emailSent($body) {

		/**
		 * Send email
		 */	
		$mailer = ($this -> emailValidate()) ? mail($this -> _to_email, $this -> _subject, $body, $this -> addHeader()) : false;

		return $mailer;
	}

	/**
	 * emailValidate
	 *
	 * This function send email
	 *
	 * @return boolean
	 */
	private function emailValidate() {

		$find_coma = ',';

		$search = strpos($this -> _to_email, $find_coma);

		if ($search === false) {
			
			if (filter_var($this -> _to_email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_PATH_REQUIRED)) {
				
				return true;
			} else {
				return false;
			}
		} else {
			
			$email_to_array = explode(',', $this -> _to_email);
			
			foreach ($email_to_array as $value) {
				
				if (filter_var(trim($value), FILTER_VALIDATE_EMAIL, FILTER_FLAG_PATH_REQUIRED)) {
					
					$flag = true;

				} else {
					
					$flag = false;
					
					break;
				}
			}
			
			return $flag;
		}
	}

	/**
	 * addHeader
	 *
	 * This function create headers for our letter
	 *
	 * @return string $this -> headers
	 */
	private function addHeader() {

		$this -> _headers  = "MIME-Version: " . $this -> _mime_version . "\r\n";
		$this -> _headers .= "From: " . $this -> _from_name . " <" . $this -> _from_email . ">\r\n";
		$this -> _headers .= "Reply-To: " . $this -> _from_email . "\r\n";
		$this -> _headers .= "Content-Type: text/plain; charset=" . $this -> _encoding . "\r\n";
		$this -> _headers .= "X-Mailer: PHP/" . phpversion();

		return $this -> _headers;
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>