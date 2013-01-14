<?php
/**
 * FilesWork.php
 *
 * This is file with AutoloadClass class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * AutoloadClass
 * 
 * This class to autoload other class
 * 
 * @version 0.1
 */
final class MailerWithAttachment {

	/**
	 * _path
	 *
	 * @var string
	 */
	private $_path = '';

	/**
	 * _hash
	 *
	 * @var string
	 */
	private $_hash = '';
	
	/**
	 * _mime_version
	 *
	 * @var string
	 */
	private $_mime_version = '1.0';
	
	/**
	 * _encoding
	 *
	 * @var string	It can be: UTF-8, ISO-8859-1, Windows-1251, KOI8-r, cp866
	 */
	private $_encoding = 'iso-8859-1';

	/**
	 * _content_type
	 *
	 * @var string	It can be: "text/plain;", "text/html;", "image/png;", "image/gif;", "video/mpeg;", "text/css;", and "audio/basic;"
	 */
	private $_content_type = 'text/html;';

	/**
	 * _headers
	 *
	 * @var string
	 */
	private $_headers = '';
	
	/**
	 * emailSent
	 * 
	 * This function sent email 
	 * 
	 * @param string 	$body
	 * @return boolean	$mailer
	 */
	/**
	 * emailSent
	 * 
	 * This function sent email 
	 *
	 * @param string $to_email
	 * @param string $from_email
	 * @param string $from_name
	 * @param string $subject
	 * @param string $body
	 * @param string $file_name
	 * 
	 * @return boolean $mailer
	 */
	public function emailSent($to_email, $from_email, $from_name, $subject, $body, $file_name) {

		/**
		 * Set variables for email
		 */
		$this -> _path = dirname(__FILE__) . '/';
		
		$content = $this -> prepareFileToSent($file_name);
		
		$hash = md5(uniqid(time()));

		$headers = $this -> addHeaders($to_email, $from_email, $from_name, $file_name, $hash, $content, $body);
		/**
		 * Send email
		 */	
		$mailer = ($this -> emailValidate($to_email)) ? mail($to_email, $subject, '', $headers) : false;

		return $mailer;
	}

	/**
	 * emailValidate
	 *
	 * This function send email
	 *
	 * @param string $to_email
	 * @return boolean
	 */
	private function emailValidate($to_email) {

		$find_coma = ',';

		$search = strpos($to_email, $find_coma);

		if ($search === false) {
			
			if (filter_var($to_email, FILTER_VALIDATE_EMAIL, FILTER_FLAG_PATH_REQUIRED)) {
				
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
	 * prepareFileToSent
	 * 
	 * This function prepare our file to sent
	 *
	 * @param string $file_name
	 * @return string $content
	 */
	private function prepareFileToSent($file_name) {
		
		$file = $this -> _path . $file_name;
		
		$file_size = filesize($file);
		
		$handle = fopen($file, "r");
		
		$content = fread($handle, $file_size);
		
		fclose($handle);
		
		$content = chunk_split(base64_encode($content));
		
		return $content;
	}

	/**
	 * addHeaders
	 * 
	 * This function create headers for our letter
	 *
	 * @param string $to_email
	 * @param string $from_email
	 * @param string $from_name
	 * @param string $file_name
	 * @param string $hash
	 * @param string $content
	 * @param string $body
	 * 
	 * @return string $headers
	 */
	private function addHeaders($to_email, $from_email, $from_name, $file_name, $hash, $content, $body) {

		$headers = "From: " . $from_email . " <" . $from_name . ">\r\n";
		$headers .= "Reply-To: " . $to_email . "\r\n";
		$headers .= "MIME-Version: " . $this -> _mime_version . "\r\n";
		$headers .= "Content-Type: multipart/mixed; boundary=\"" . $hash . "\"\r\n\r\n";
		$headers .= "This is a multi-part message in MIME format.\r\n";
		$headers .= "--" . $hash . "\r\n";
		$headers .= "Content-type:text/plain; charset=" . $this -> _encoding . "\r\n";
		$headers .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
		$headers .= $body . "\r\n\r\n";
		$headers .= "--" . $hash . "\r\n";
		$headers .= "Content-Type: application/octet-stream; name=\"" . $file_name . "\"\r\n"; // use different content types here
		$headers .= "Content-Transfer-Encoding: base64\r\n";
		$headers .= "Content-Disposition: attachment; filename=\"" . $file_name . "\"\r\n\r\n";
		$headers .= $content . "\r\n\r\n";
		$headers .= "--" . $hash . "--";

		return $headers;
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>