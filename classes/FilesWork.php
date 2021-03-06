<?php
/**
 * FilesWork.php
 *
 * This is file with FilesWork class
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * FilesWork
 * 
 * This class to work with files
 * 
 * @version 0.1
 */
final class FilesWork {
	
	/**
	 * getFileExtension
	 * 
	 * This function get file extension
	 *
	 * @param string $file_name
	 * @return string
	 */
	static public function getFileExtension($file_name) {
		
		/**
		 * Get extension
		 */
		$extension = substr($file_name, strpos($file_name, '.'));
		
		/**
		 * Replase in extension paint '.' on the empty ''  
		 */
		return str_replace('.', '', $extension);
	}
	
	/**
	 * removeFileExtension
	 * 
	 * This function remove extension from file name
	 *
	 * @param string	$file_name
	 * @return string	$remove_extension
	 */
	static public function removeFileExtension($file_name) {
		
		/**
		 * Find the last occurrence of a character in a string
		 */
		$extension = strrchr($file_name, '.');
		
		/**
		 * Remove extension
		 */
		$remove_extension = ($extension == false) ? false : substr($file_name, 0, -strlen($extension));
		
		/**
		 * Return file name without extension
		 */
		return $remove_extension;
	}
	
	/**
	 * getFileSize
	 * 
	 * This function get file size
	 *
	 * @param string	$file_path
	 * @return string	$file_size
	 */
	static public function getFileSize($file_path) {
		
		/**
		 * Get file size
		 */
		$file_size = (file_exists($file_path)) ? filesize($file_path) : 0;
		
		/**
		 * Set array with units size
		 */
		$array_with_units = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");

		/**
		 * Get file size
		 */
		$file_size = ($file_size == 0) ? false : round($file_size / pow(1024, ($i = floor(log($file_size, 1024)))), 2) . $array_with_units[$i];

		/**
		 * Return file size
		 */
		return $file_size;
	}
	
	/**
	 * listFilesInDirectory
	 * 
	 * This function list files in adjusted directory
	 *
	 * @param string	$dir_path
	 * @return array	$array_file_name
	 */
	static public function listFilesInDirectory($dir_path) {
		
		/**
		 * If directory open then...
		 */
		if ($dir = opendir($dir_path)) {
			
			while (($file_name = readdir($dir)) !== false) {
				if (!is_dir($dir_path . $file_name)) {
					$array_file_name[] = $file_name;
				}
			}
			
			/**
			 * Rerurn array with files name
			 */
			return $array_file_name;
		}
	}

	/**
	 * listAllFilesAndFolderInDirectory
	 * 
	 * This function list all files and folders in adjusted directory
	 *
	 * @param string $dir_path
	 * @return array $files_array
	 */
	static public function listAllFilesAndFolderInDirectory($dir_path) {

		/**
		 * Create iterator object
		 */
		$recursiv_iterator_object = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir_path), RecursiveIteratorIterator::SELF_FIRST);

		/**
		 * Write data in file
		 */
		foreach ($recursiv_iterator_object as $file) { 
			$files_array[] = $file . "\r\n";
		}

		/**
		 * Return array with files list
		 */
		return $files_array;
	}

	/**
	 * fileExistsRemotely
	 * 
	 * This function check file exists on remote server
	 *
	 * @param string $file_url
	 * @return boolean
	 */
	static public function fileExistsRemotely($file_url) {
	
		/**
		 * Get headers from remote server
		 */
		$file_headers = get_headers($file_url);

		/**
		 * If header is 404 then return false else return true 
		 */
		if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * forceDownloadFile
	 * 
	 * This function make download file
	 *
	 * @param string $file_path
	 * @return /false
	 */
	static public function forceDownloadFile($file_path) {

		if (isset($file_path) and file_exists($file_path)) {

			/**
			 * Set headers
			 */
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file_path));
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file_path));
			
			/**
			 * Clean (erase) the output buffer
			 */
			ob_clean();
			
			/**
			 * Flush the output buffer
			 */
			flush();
			
			/**
			 * Read file
			 */
			readfile($file_path);
			
			/**
			 * Output a message and terminate the current script
			 */
			exit(0);
			
		} else {
			return false;
		}
	}

	/**
	 * writeContentToFile
	 * 
	 * This function write content to file
	 *
	 * @param string $file_name
	 * @param string $data
	 * 
	 * @return boolean
	 */
	static public function writeContentToFile($file_name, $data) {

		if (isset($file_name) and isset($data)) {
		
			$file_open = fopen($file_name, "w+");

			$file_write = fwrite($file_open, $data);

			$file_close = fclose($file_open);
			
			return true;
			
		} else {
			return false;
		}
	}

	/**
	 * readContentFromFile
	 * 
	 * This function read content from file
	 *
	 * @param string $file_name
	 * @return string / boolean
	 */
	static public function readContentFromFile($file_name) {
		
		if (isset($file_name) and !empty($file_name)) {
		
			$file_open = fopen($file_name, "rb");

			$content = fread($file_open, filesize($file_name));

			$file_close = fclose($file_open);
			
			return $content;
			
		} else {
			return false;
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