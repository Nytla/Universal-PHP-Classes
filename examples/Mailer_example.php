<?php
/**
 * mailer_example.php
 *
 * This is file with example for mailer class
 *
 * @category	examples
 * @copyright	2012
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * Require file with mailer class
 */
require_once(dirname(__FILE__) . '/../classes/Mailer.php');

/**
 * Create body of our letter
 */
$body = 'This is body of our letter.';

/**
 * Create copy of Mailer object
 */
$object = new Mailer();

/**
 * Sent email
 */
//$object -> sentEmail($body);

if ($object -> emailSent($body)) {
	echo 'Email was sent.';
} else {
	echo 'Email does not sent.';
}
?>