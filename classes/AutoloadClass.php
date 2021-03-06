<?php
/**
 * AutoloadClass.php
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
final class AutoloadClass {

	/**
	 * Constructor
	 * 
	 * Initialize class loader
	 */
	public function __construct() {
		spl_autoload_register(array($this, 'classLoader'));
	}

	/**
	 * classLoader
	 * 
	 * This function load class
	 *
	 * @param string $class_name
	 */
	private function classLoader($class_name) {

		/**
		 * Create variable with root path
		 */
		$root = dirname(__FILE__);

		/**
		 * Create array with folder paths
		 */
		$paths = array(
			$root . '/../classes/' . $class_name . '.php',
			//Example
//			$root . '/../app/controllers/' . $class_name . '.php',
//			$root . '/../app/models/' . $class_name . '.php',			
		);

		/**
		 * Loop through an array and if file exists include him
		 */
		foreach ($paths as $path) {

			if (file_exists($path)) {
				
				include_once($path);

				break;
			}
		}
	}
	
	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}

/**
 * Run classAutoloader
 */
new AutoloadClass();
?>