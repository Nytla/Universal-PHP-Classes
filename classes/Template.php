<?php
/**
 * Template.php
 *
 * This is file with Template class 
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Template
 * 
 * This class render template
 * 
 * @version 0.1
 */
final class Template {
	
	/**
	 * _params
	 *
	 * @var null
	 */
	private $_params;
	
	/**
	 * renderTemplate
	 *
	 * This function render our template file
	 *
	 * @param string $template_name
	 * @param array $params
	 * 
	 * @return string $content
	*/
	public function renderTemplate($template_name, $params) {

		/**
		 * Read template file
		 */
		$read_file = $this -> readTemplateFile($template_name);
		
		/**
		 * Set variable with template parameters
		 */
		$this -> _params = $params;
		
		/**
		 * Parse template and create variable with template content
		 */
		$content = '';
		
		while(list($line, $string) = each($read_file)) {
			$content .= $this -> parseContent($string);
		}
		
		return $content;
	}
	
	/**
	 * parseContent
	 *
	 * This function parse template with content
	 *
	 * @param string $string
	 * @return string
	 *
	 */
	private function parseContent($string) {
		return preg_replace_callback("/@([[:alnum:]]+)@/", array($this, 'setParameters'), $string);
	}

	/**
	 * setParameters
	 *
	 * This function set parameters for our template
	 *
	 * @param array $array
	 * @return string/null
	 */
	private function setParameters($array) {

		/**
		 * Set variable with our parameter
		 */
		$params = $this -> _params;
		
		/**
		 * If parameter does not empty then return string with him or else return null
		 */
		return (!empty($params[$array[1]])) ? $params[$array[1]] : null;
	}

	/**
	 * readTemplateFile
	 *
	 * This function read template file
	 *
	 * @param string $path
	 * @return boolean/array $array
	 *
	 */
	private function readTemplateFile($path) {

		switch ($path) {
			case (!is_file($path)):
				
				return false;
				
				break;
		
			case (!filesize($path)):
				
				return array();
				
				break;
				
			case (is_array(file($path))):
				
				return file($path);
				
				break;

			default:

				while(!$array=file($path)) {
					sleep(1);
				}

				return $array;
		}
	}

	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {}
}
?>