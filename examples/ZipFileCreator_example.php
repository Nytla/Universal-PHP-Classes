<?php
/**
 * ZipFileCreator.php
 *
 * This is file with example for zip file creator class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with zip file creator class
 */
require_once(dirname(__FILE__) . '/../classes/ZipFileCreator.php');

/**
 * Create copy of ZipFileCreator object
 */
$object = new ZipFileCreator();

/**
 * Set name of zip file
 */
$zip_file_name = 'my_example_archive.zip';

/**
 * Set array with files for zip archive
 */
$files_for_zip = array(
	'Cookie_example.php',
	'Mailer_example.php'
);

/**
 * Create zip file
 */
//print $object -> createZipFile($zip_file_name, $files_for_zip);

if ($object -> createZipFile($zip_file_name, $files_for_zip)) {
	echo 'Zip file was created successfully.';
} else {
	echo 'Zip file does not created.';
}
?>