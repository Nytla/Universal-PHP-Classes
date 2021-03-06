<?php
/**
 * Redirect.php
 *
 * This is file with Redirect class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Redirect
 * 
 * This is redirect class
 * 
 * @version 0.1
 */
final class Redirect {

	/**
	 * uriRedirect
	 *
	 * This function to redirect our user on page error
	 *
	 * @param integer $code	This is http status code
	 * @param string $url	This is url where script redirect our user
	 */
	static public function uriRedirect($code, $url = 'http://example.com') {

		/**
		 * Formed url where make our redirect
		 */
		$uri = ($code == 301) ? $url : $url . '?error=' . $code;

		/**
		 * Send http header
		 */
		header(true, $code);

		/**
		 * To do Redirect
		 */
		header("Location: $uri");

		/**
		 * Exit in our script (The status 0 is used to terminate the program successfully.)
		 */
		exit(0);
	}
}
?>