<?php
/**
 * Cookie_example.php
 *
 * This is file with example for cookie class
 *
 * @category examples
 * @copyright 2012
 * @author Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with cookie class
 */
require_once(dirname(__FILE__) . '/../classes/Cookie.php');

/**
 * Set cookie (lasts forever)
 * 
 * Cookie::SESSION_EXPIRE - Set cookie which expires with sessions
 * Cookie::ONE_DAY - Set cookie which expires after one day 
 * Cookie::SEVEN_DAYS - Set cookie which expires after seven days
 * Cookie::THIRTY_DAYS - Set cookie which expires after thirty days
 * Cookie::SIX_MONTHS - Set cookie which expires after six months
 * Cookie::ONE_YEAR - Set cookie which expires after one year
 * Cookie::LEFTTIME - Set cookie which expires 2030-01-01 00:00:00
 */
Cookie::set('name_example', 'value_true', Cookie::LIFETIME, '/', '.domain.com');

/**
 * Get cookie
 */
echo Cookie::get('name_example');

/**
 * Check cookie (exists)
 */
if (Cookie::exists('name_example')) {
	echo 'Cookie exists.';
} else {
	echo 'Cookie is not exists.';
}

/**
 * Check cookie (isEmpty)
 */
if (Cookie::isEmpty('name_example')) {
	echo 'Cookie is empty.';
} else {
	echo 'Cookie is not empty.';
}

/**
 * Delete cookie
 */
Cookie::delete('name_example', '/', '.domain.com');
?>