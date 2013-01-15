<?php
/**
 * ImagesResizer_example.php
 *
 * This is file with example for ImagesResizer class
 *
 * @category	examples
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with ImagesResizer class
 */
require_once(dirname(__FILE__) . '/../classes/ImagesResizer.php');

/**
 * Create upload form for image
 */
echo '
<html>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<label for="file">Filename:</label>
			<input type="file" name="image_file" id="image_file">
			<input type="hidden" name="MAX_FILE_SIZE" value="1024000"> 
			<input type="submit" name="submit" value="Upload">
		</form>
	</body>
</html> 
';

/**
 * Check variable from upload form
 */
if ($_FILES['image_file']['error'] == 0 and $_FILES['image_file']['size'] > 0) {
	
	/**
	 * Create copy of object
	 */
	$object = new ImageResizer();
	
	/**
	 * Resize our upload image
	 */
	echo $object -> getImageClients($_FILES);
}
?>