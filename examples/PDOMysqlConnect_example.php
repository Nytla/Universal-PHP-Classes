<?php
/**
 * PDOMysqlConnect.php
 *
 * This is file with example for PDOMysqlConnect class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with PDOMysqlConnect class
 */
require_once(dirname(__FILE__) . '/../classes/PDOMysqlConnect.php');

/**
 * Create connect to Database
 */
if (PDOMysqlConnect::dbConnect()) {
	
	echo 'Good connection. <br>';
	
	/**
	 * Create variable with query content
	 */
/*
	$select = "
		SELECT 
			`id`, 
			`first_name`,
			`last_name`
		FROM exampe_table 
	";
*/
	/**
	 * Printing data from table in a cycle
	 */
/*
	foreach (PDOMysqlConnect::dbConnect() -> query($select) as $row) {	
		echo $row['id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '<br>';
	}
*/
} else {
	
	echo 'Bad connection.';
}
?>