<?php
/**
 * FilesWork_example.php
 *
 * This is file with example for FilesWork class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with FilesWork class
 */
require_once(dirname(__FILE__) . '/../classes/FilesWork.php');

/**
 * Set file name
 */
$file_name = 'example.html';

/**
 * Print file extension
 */
//print FilesWork::getFileExtension($file_name);

/**
 * Print file name without extension
 */
//print FilesWork::removeFileExtension($file_name);

/**
 * Print file size
 */
//print FilesWork::getFileSize($file_name);

/**
 * Set directory name
 */
//$dir_name = 'e:/some_folder/'; //Windows

//$dir_name = '/home/user_name/some_folder/'; //Unix

/**
 * Print array with file name
 */
//print_r(FilesWork::listFilesInDirectory($dir_name));

/**
 * Print array with all files and folder in directory
 */
//print_r(FilesWork::listAllFilesAndFolderInDirectory($dir_name));

/**
 * Download file
 */
FilesWork::forceDownloadFile($file_name);
?>