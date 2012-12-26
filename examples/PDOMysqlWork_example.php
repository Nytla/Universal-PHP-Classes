<?php
/**
 * PDOMysqlWork.php
 *
 * This is file with example for PDOMysqlWork class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with PDOMysqlWork class
 */
require_once(dirname(__FILE__) . '/../classes/PDOMysqlWork.php');

/**
 * Instantiate PDOMysqlWork class
 */
$db = new PDOMysqlWork();

/**
 * Debugging queries (default disabled)
 */
$db -> _debug = true;

/**
 * Select all rows in a table
 */
//print_r($db -> select('users'));

/**
 * Select based on criteria
 */
//print_r($db -> select('users', '*' ,array('`id`' => 2)));

/**
 * Select certain values based on criteria
 */
//print_r($db -> select('users', '`id`, `name`', array('`id`' => 2)));

/**
 * Select based on criteria with a set order
 */
//print_r($db -> select('users', '*', array('`num`' => 1), 'ORDER BY `id` ASC'));

/**
 * Select single row based on criteria
 */
//print_r($db -> selectOne('users', '*', array('`id`' => 2)));

/**
 * Create array with data that will be insert to our table 
 */
$options = array(
	'id'			=> '',
	'first_name'	=> 'John',
	'last_name' 	=> 'Doe'
);

/**
 * Insert into table; returns primary key of that row
 */
//echo $db -> insert('users', $options);

/**
 * Create array with data that will be update to our table 
 */
$options=array(
	'first_name' => 'New John',
    'last_name' => 'New Doe'
);

/**
 * Update table
 */
//$db -> update('users', $options, array('id' => 27));

/**
 * Delete from table
 */
//$db -> delete('users', array('id' => 27));

/**
 * Get a count of rows matching the criteria
 */
//echo $db -> getCount('users', array('id' => '5'));

//echo $db -> getCount('users', array('first_name' => 'John'));

//echo $db -> getCount('users');

/**
 * Select a single value from a table
 */
echo $db -> getValue('users', 'first_name', array('id' => 1));
?>