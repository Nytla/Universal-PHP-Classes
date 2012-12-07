<?php
/**
 * PDOMysqlConnect.php
 *
 * This is PDO MYSQL file
 * 
 * @category	classes
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * PDOMysqlConnect
 * 
 * This is PDO MYSQL Connect class
 * 
 * @version 0.1
 */
final class PDOMysqlConnect {

	/**
	 * _DB_driver
	 * 
	 * @var string	This is name of Database driver
	 */
	static private $_DB_driver = 'mysql';

	/**
	 * _DB_host
	 * 
	 * @var string	This is address of host our Database
	 */
	static private $_DB_host = 'localhost';

	/**
	 * _DB_port
	 * 
	 * @var string	This is port of protocol our Database
	 */
	static private $_DB_port = '3306';
	
	/**
	 * _DB_name
	 * 
	 * @var string	This is name of Database
	 */
	static private $_DB_name = 'example_database';

	/**
	 * _DB_login
	 * 
	 * @var string	This is login of user our Database
	 */
	static private $_DB_login = 'root';

	/**
	 * _DB_password
	 * 
	 * @var string	This is password of user our Database
	 */
	static private $_DB_password = '';

	/**
	 * _DB_encoding
	 * 
	 * @var string	This is encoding of our Database
	 */
	static private $_DB_encoding = 'utf8';

	/**
	 * _DB_connect
	 * 
	 * @var string	This is connect to our Database
	 */
	static private $_DB_connect;

	/**
	 * dbConnect
	 *
	 * This function initialize connect to our Database
	 *
	 * @return object $_DB_connect	This is PDO connect mysql
	 */
	static public function dbConnect() {

		/**
		 * Create variable with connect data  
		 */
		$connect = self::$_DB_driver 
			. ':host=' . self::$_DB_host 
			. ';port=' . self::$_DB_port 
			. ';dbname=' . self::$_DB_name;

		try {
			
			/**
			 * Create PDO object
			 */
			self::$_DB_connect = new PDO(
				$connect,
				self::$_DB_login,
				self::$_DB_password,
				array(
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'' . self::$_DB_encoding . '\''
				)
			);

			/**
			 * Set attribute for DB connect
			 */
			self::$_DB_connect -> setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);

			return self::$_DB_connect;

		} catch (PDOException $object) {

			###############################################
			# Good use of exceptions - is a error handling
			###############################################
			/**
			 * If bad connection to MYSQL then write error message to errors.log
			 */
//			ErrorsLog::write($object -> getMessage());
			
			/**
			 * Redirect to error page
			 */
//			Redirect::uriRedirect('bad_connect');


			##############################################
			# bad use of exceptions - is a return boolean
			##############################################
			/**
			 * This is bad use of exceptions, but it is necessary for example
			 */
			return false;
		}
	}

	/**
	 * Destructor
	 *
	 * This is destructor close connect with Data Base
	 */
	public function __destruct() {

		self::$_DB_connect = null;
	}
}
?>
