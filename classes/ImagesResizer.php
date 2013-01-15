<?php
/**
 * ImageResizer.php
 *
 * This is file with ImageResizer class
 * 
 * @category	classes
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * ImageResizer
 * 
 * This is ImageResizer class
 * 
 * @version 0.1
 */
final class ImageResizer {

	/**
	 * _thumb_max_width
	 * 
	 * @var integer	This is max width for thumbnail image
	 */
	private $_thumb_max_width = 300;

	/**
	 * _thumb_max_height
	 * 
	 * @var integer	This is max height for thumbnail image
	 */
	private $_thumb_max_height = 300;

	/**
	 * _big_image_max_width
	 * 
	 * @var integer	This is max width for big image
	 */
	private $_big_image_max_width = 500;

	/**
	 * _big_image_max_height
	 * 
	 * @var integer	This is max height for big image
	 */
	private $_big_image_max_height = 500;

	/**
	 * _thumbnail_prefix
	 * 
	 * @var string	This is thumbnail prefix
	 */
	private $_thumbnail_prefix = 'thumb_';
	
	/**
	 * _thumbnail_prefix
	 * 
	 * @var string	This is destination image path
	 */
	private $_destination_image_path = './../examples/upload_images/';

	/**
	 * _image_quality
	 * 
	 * @var integer	This is image quality (%)
	 */
	private $_image_quality = 90;

	/**
	 * _new_image_width
	 * 
	 * @var integer	This is new image width
	 */
	private $_new_image_width;

	/**
	 * _new_image_height
	 * 
	 * @var integer	This is new image height
	 */
	private $_new_image_height;

	/**
	 * getImageClients
	 *
	 * This function add new image in DB 
	 *
	 * @param array
	 * @return json
	 */
	public function getImageClients($_FILES) {

		/**
		 * If image size > max size echo error
		 */
		if ((int) $_FILES['image_file']['size'] > (int) $_POST['MAX_FILE_SIZE'] or (int) $_FILES['image_file']['size'] == 0) {

			/**
			 * Return error image size
			 */
			return json_encode(
				array(
					"error" => 'size'
				)
			);
		}

		/**
		 * We need same random name for both files
		 */
		$random_number = rand(0, 9999999999);

		/**
		 * Some information about image we need later
		 */
		$image_name	= strtolower($_FILES['image_file']['name']);
		$image_size	= $_FILES['image_file']['size'];
		$temp_src	= $_FILES['image_file']['tmp_name'];
		$image_type	= $_FILES['image_file']['type'];
		$process	= true;

		/**
		 * Validate file + create image from uploaded file
		 */
		switch(strtolower($image_type)) {

			case 'image/png':

				$created_image = imagecreatefrompng($_FILES['image_file']['tmp_name']);

				break;

			case 'image/gif':

				$created_image = imagecreatefromgif($_FILES['image_file']['tmp_name']);

				break;

			case 'image/jpeg':

				$created_image = imagecreatefromjpeg($_FILES['image_file']['tmp_name']);

				break;

			default:

				/**
				 * Return error image expansion
				 */
				return json_encode(
					array(
						"error"	=> 'expansion'
					)
				);
		}

		/**
		 * Get Image Size
		 */
		list ($curent_width, $curent_height) = getimagesize($temp_src);

		/**
		 * Set image size summa
		 */
		$size_summa = (int) ($curent_width / $this -> _thumb_max_width) + ($curent_height / $this -> _thumb_max_height);

		/**
		 * Get file extension, this will be added after random name
		 */
		$image_ext = substr($image_name, strrpos($image_name, '.'));

		$image_ext = str_replace('.', '', $image_ext);

		/**
		 * Set the Destination Image path with Random Name
		 */
		$thumb_dest_rand_image_name	= $this -> _destination_image_path . $this -> _thumbnail_prefix . $random_number . '.' . $image_ext;

		$dest_rand_image_name		= $this -> _destination_image_path . $random_number . '.' . $image_ext;

		/**
		 * Resize image to our Specified Size by calling our resizeImage function
		 */
		if ($size_summa > 1 and $this -> resizeImage($curent_width, $curent_height, $this -> _big_image_max_width, $this -> _big_image_max_height, $dest_rand_image_name, $created_image, $this -> _image_quality)) {

			/** 
			 * Create Thumbnail for the Image
			 */
			$this -> resizeImage($curent_width, $curent_height, $this -> _thumb_max_width, $this -> _thumb_max_height, $thumb_dest_rand_image_name, $created_image, $this -> _image_quality);

			/**
			 * Respond with our images
			 */
			$uploads_client_path = $this -> _destination_image_path;

			/**
			 * Insert info into database table.. do w.e!
			 */
			$data_array = array(
				"image_name"	=> $uploads_client_path . $this -> _thumbnail_prefix . $random_number . '.' . $image_ext,
				"image_height"	=> $this -> _new_image_height,
				"image_width"	=> $this -> _new_image_width
			);

			return json_encode($data_array);
			
		} else {

			/**
			 * Return error image resize
			 */
			return json_encode(
				array(
					"error"	=> 'resize'
				)
			);
		}
	}

	/**
	 * resizeImage
	 *
	 * This function resize image
	 *
	 * @param integer $curent_width
	 * @param integer $curent_height
	 * @param integer $max_width
	 * @param integer $max_height
	 * @param integer $dest_folder
	 * @param integer $src_image
	 * @return boolean
	 */
	private function resizeImage($curent_width, $curent_height, $max_width, $max_height, $dest_folder, $src_image, $quality) {

		/**
		 * Set some variables
		 */
		$ImageScale			= min($max_width / $curent_width, $max_height / $curent_height);
		$this -> _new_image_width	= ceil($ImageScale * $curent_width);
		$this -> _new_image_height	= ceil($ImageScale * $curent_height);
		$NewCanves			= imagecreatetruecolor($this -> _new_image_width, $this -> _new_image_height);

		/**
		 * Resize Image
		 */
		if (imagecopyresampled($NewCanves, $src_image,0, 0, 0, 0, $this -> _new_image_width, $this -> _new_image_height, $curent_width, $curent_height)) {

			/**
			 * Copy file
			 */
			if(imagejpeg($NewCanves, $dest_folder, $quality)) {

			    imagedestroy($NewCanves);

			    return true;
			}
		}
	}
}
?>