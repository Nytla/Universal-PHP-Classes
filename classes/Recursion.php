<?php
/**
 * Recursion.php
 *
 * This is file with Recursion class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Recursion
 * 
 * This is a recursion class
 * 
 * @version 0.1
 * 
 * @see http://php.net/manual/en/class.recursivedirectoryiterator.php
 * @see http://www.lornajane.net/posts/2012/php-recursive-function-example-factorial-numbers
 * @see http://devzone.zend.com/283/recursion-in-php-tapping-unharnessed-power/
 * @see http://phpmaster.com/understanding-recursion/
 * @see http://www.phpfresher.com/tag/recursion-function/
 * @see http://php.net/manual/ru/class.recursiveiterator.php
 */
final class MyRecursiveIterator implements RecursiveIterator {

	/**
	 * Enter description here...
	 *
	 * @var unknown_type
	 */
	private $_data;

	/**
	 * Enter description here...
	 *
	 * @var unknown_type
	 */
	private $_position = 0;
   
	/**
	 * Enter description here...
	 *
	 * @param array $data
	 */
	public function __construct(array $data) {
		$this->_data = $data;
	}

	/**
	 * Enter description here...
	 *
	 * @return unknown
	 */
	public function valid() {
		return isset($this->_data[$this->_position]);
	}

	/**
	 * Enter description here...
	 *
	 * @return unknown
	 */
	public function hasChildren() {
		return is_array($this->_data[$this->_position]);
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function next() {
		$this->_position++;
	}
	
	/**
	 * Enter description here...
	 *
	 * @return unknown
	 */
	public function current() {
		return $this->_data[$this->_position];
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function getChildren() {
		echo '<pre>';
		print_r($this->_data[$this->_position]);
		echo '</pre>';
	}
	
	/**
	 * Enter description here...
	 *
	 */
	public function rewind() {
		$this->_position = 0;
	}

	/**
	 * Enter description here...
	 *
	 * @return unknown
	 */
	public function key() {
		return $this->_position;
	}
}