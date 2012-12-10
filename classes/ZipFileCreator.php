<?php
/**
 * ZipFileCreator.php
 *
 * This file with zip file creator class 
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * ZipFileCreator
 * 
 * This is autoload zip file creator class
 * 
 * @version 0.1
 */
final class ZipFileCreator extends ZipArchive {

	/**
	 * createZipFile
	 *
	 * This is function create zip file
	 *
	 * @param string $zip_file_name
	 * @param array $files
	 * @param boolean $overwrite
	 * 
	 * @return boolean
	 */
	public function createZipFile($zip_file_name, $files = array(), $overwrite = false) {

		/**
		 * If the zip file already exists and overwrite is false, return false
		 */
		if(file_exists($zip_file_name) and !$overwrite) {	
			return false;
		}

		/**
		 * Set array
		 */
		$valid_files = array();

		/**
		 * If files were passed in...
		 */
		if(is_array($files)) {

			/**
			 * Cycle through each file
			 */
			foreach($files as $file) {
				/**
				 * Make sure the file exists
				 */
				if(file_exists($file)) {
					$valid_files[] = $file;
				}
			}
		}

		/**
		 * If we have good files...
		 */
		if(count($valid_files)) {

			if(parent::open($zip_file_name, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
				return false;
			}

			/**
			 * Create zip archive
			 */
			foreach ($valid_files as $file) {
				parent::addFile($file);
			}

			/**
			 * Close the zip -- done!
			 */
			parent::close();
			
			/**
			 * check to make sure the file exists
			 */
			return file_exists($zip_file_name);
		} else {
			return false;
		}
	}
	
	/**
	 * Destructor
	 *
	 * This function is destructor
	 */
	public function __destruct() {
		
			
	}
}
?>