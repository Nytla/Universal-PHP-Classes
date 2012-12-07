<?php
/**
 * TestingLoading.php
 *
 * This is file with TestingLoading class
 *
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * TestingLoading
 *
 * This class testing our code on loading
 *
 * @version 1.0
 */
final class TestingLoading {
	
	/**
	 * _begin
	 *
	 * @var null
	 */
	private $_begin;
	
	/**
	 * __construct
	 * 
	 * This function initialize microtime 
	 *
	 */
	public function __construct() {
		
		$this -> _begin = microtime(TRUE);
	}

	/**
	 * calculateAndPrintInfo
	 * 
	 * 
	 *
	 */
	public function calculateAndPrintInfo() {

		/**
		 * Initialize microtime after script terminates run
		 */
		$finish = microtime(TRUE);

		/**
		 * Calculate generation time
		 */
		$diff = sprintf('%.5f', $finish - $this -> _begin);

		/**
		 * Calculate peak
		 */
		$peak = memory_get_peak_usage();

		/**
		 * Calculate memoru
		 */
		$memory = memory_get_usage();
		
		/**
		 * Set variable with our calculating information
		 */
		$content = "\r\nGeneration: $diff. Memory: $memory. Peak: $peak";
		
		return $content;
	}
}
?>