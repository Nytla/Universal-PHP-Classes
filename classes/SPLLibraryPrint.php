<?php
/**
 * SPLLibraryPrint.php
 *
 * This is file with SPLLibraryPrint class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * SPLLibraryPrint
 * 
 * This is SPLLibraryPrint class
 * 
 * @version 0.1
 */
final class SPLLibraryPrint {

	/**
	 * printSLPClassesAndMethods
	 * 
	 * This function print all classes and their methods
	 *
	 * @return array $spl_array
	 */
	static public function printSLPClassesAndMethods() {
	
		/**
		 * Declared all classes in variable
		 */
		$classes = get_declared_classes();
		
		/**
		 * Formed array with SPL classes and their methods
		 */
		$arr = array();
		
		foreach($classes as $class) {
			if(count(get_class_methods($class)) != 0) { 
				$spl_array[$class]['methods'] = get_class_methods($class);
			}
			
			if(count(get_class_vars($class)) != 0) { 
				$spl_array[$class]['vars'] = get_class_vars($class);
			}
		}
		
		/**
		 * Return array with SPL classes and their methods
		 */
		return $spl_array;
	}
}
?>