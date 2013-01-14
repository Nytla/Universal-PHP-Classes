<?php
/**
 * MysqlSearch_example.php
 *
 * This is file with example for MysqlSearch class
 *
 * @category	examples
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with MysqlSearch class
 */
require_once(dirname(__FILE__) . '/../classes/MysqlSearch.php');

/**
 * Set variable for DB connect
 */
$data['server'] = 'localhost';

$data['user'] = 'root';

$data['password'] = '';

$data['db_name'] = 'example_name';

/**
 * Create variable with copy of our object
 */
$object = new MysqlSearch($data);

/**
 * Set table
 */
$object -> setTable('table_name');

/**
 * Set primary key of table
 */
$object -> setIdentifier('id');

/**
 * Set columns in which seatch
 */
$object -> setSearchColumns('name');

/**
 * Set keywords
 */
$keywords = 'test_keyword';

/**
 * Print result of searching
 */
print_r($object -> findKeywords($keywords));
?>